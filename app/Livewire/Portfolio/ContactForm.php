<?php

namespace App\Livewire\Portfolio;

use Livewire\Component;
use App\Models\Contact;
use App\Mail\PortfolioContactMessage;
use Illuminate\Support\Facades\Mail;

class ContactForm extends Component
{
    public $name = '';
    public $email = '';
    public $subject = '';
    public $message = '';

    protected function rules(): array
    {
        return [
            'name' => 'required|string|max:120',
            'email' => 'required|email|max:180',
            'subject' => 'nullable|string|max:140',
            'message' => 'required|string|min:20|max:1500',
        ];
    }

    public function submit(): void
    {
        $this->validate();

        $contact = Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'subject' => $this->subject,
            'message' => $this->message,
            'status' => 'new',
        ]);

        try {
            Mail::to(config('mail.from.address'))->send(new PortfolioContactMessage($contact));
        } catch (\Throwable $exception) {
            report($exception);
        }

        $this->reset(['name', 'email', 'subject', 'message']);
        $this->dispatch('notify', [
            'type' => 'success',
            'message' => 'Your message has been sent. I will be in touch soon.',
        ]);
    }

    public function render()
    {
        return view('livewire.portfolio.contact-form');
    }
}
