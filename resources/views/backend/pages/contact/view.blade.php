<div id="contact-details">
    @if($contact->page)
    <p><strong>Page Name:</strong> {{$contact->page}}</p>
    @endif
    @if($contact->company_name)
    <p><strong>Company Name:</strong> {{$contact->company_name}}</p>
    @endif   
    @if($contact->full_name)
    <p><strong>Full Name:</strong> {{$contact->full_name}}</p>
    @endif   
    @if($contact->email)
    <p><strong>Email:</strong> {{$contact->email}}</p>
    @endif
    @if($contact->mobile)
    <p><strong>Mobile:</strong> {{$contact->mobile}}</p>
    @endif
    @if($contact->product)
    @php $products_name = DB::table('products')->where('id', $contact->product)->pluck('title')->first(); @endphp
    <p><strong>Product Name:</strong> {{$products_name}}</p>
    @endif   
    @if($contact->apply_for)
    <p><strong>Apply For:</strong> {{$contact->apply_for}}</p>
    @endif
    @if($contact->type_code)
    <p><strong>Type Code:</strong> {{$contact->type_code}}</p>
    @endif
    @if($contact->quantity)
    <p><strong>Quantity:</strong> {{$contact->quantity}}</p>
    @endif
    @if($contact->message)
    <p><strong>Message:</strong> {{$contact->message}}</p>
    @endif  
</div>