<div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px;">
    <h2 style="color: #333;">New Portfolio Contact Message</h2>
    
    <div style="background-color: #f5f5f5; padding: 15px; border-radius: 8px; margin: 20px 0;">
        <p><strong>From:</strong> {{ $contact->name }}</p>
        <p><strong>Email:</strong> <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></p>
        @if($contact->subject)
            <p><strong>Subject:</strong> {{ $contact->subject }}</p>
        @endif
    </div>

    <div style="padding: 15px; border-left: 4px solid #007bff; background-color: #f9f9f9; margin: 20px 0;">
        <p style="white-space: pre-wrap; line-height: 1.6;">{{ $contact->message }}</p>
    </div>

    <div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid #ddd; font-size: 12px; color: #666;">
        <p>Received: {{ $contact->created_at->format('F d, Y \a\t g:i A') }}</p>
    </div>
</div>
