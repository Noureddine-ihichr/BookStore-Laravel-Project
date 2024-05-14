
@include('includes.header')

@if(session('messageSent'))
    <script>
        setTimeout(function() {
            alert('Your message has been sent successfully!');
        });
    </script>
@endif


<div class="heading">
   <h3>Contact Us</h3>
   <p><a href="{{ route('home') }}">Home</a> / Contact</p>
</div>

<section class="contact">
   <form action="{{ route('save_contact') }}" method="post">
      @csrf 
      <h3>Say Something!</h3>
      <input type="text" name="name" required placeholder="Enter your name" class="box">
      <input type="email" name="email" required placeholder="Enter your email" class="box">
      <input type="number" name="number" required placeholder="Enter your number" class="box">
      <textarea name="message" class="box" placeholder="Enter your message" cols="30" rows="10"></textarea>

      <input type="submit" value="Send Message" name="send" class="btn">
   </form>
</section>

@include('includes.footer')

