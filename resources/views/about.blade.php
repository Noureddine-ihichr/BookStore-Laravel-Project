
@include('includes.header')

<div class="heading">
    <h3>about us</h3>
    <p> <a href="{{ route('home') }}">home</a> / about </p>
</div>

<section class="about">

    <div class="flex">

        <div class="image">
            <img src="{{ asset('images/about-img.jpg') }}" alt="">
        </div>

        <div class="content">
            <h3>why choose us?</h3>
            <p>At <span style="color: purple;">BookStrom</span>, we pride ourselves on being more than just a bookstore. Here's why you should choose us:
            
            <p>- Diverse Selection: We offer a curated collection of books spanning genres, ensuring there's something for every reader.</p> 
              <p> - Passionate Staff: Our team is comprised of avid readers who are dedicated to sharing their love of books and providing personalized recommendations.</p> 
              <p> - Community Focus: We believe in fostering a sense of community and connection through book clubs, author events, and other literary gatherings.</p>
               <p>- Exceptional Service: From helping you find the perfect book to offering gift wrapping services, we go above and beyond to ensure your shopping experience is enjoyable and hassle-free.
              <p> - Supporting Local: By choosing us, you're supporting a locally-owned and operated business that values and invests in our community.</p>
               <p>>Discover the difference at <span style="color: purple;">BookStrom</span> and let us help you embark on your next reading adventure.</p>
            <a href="{{ route('contact') }}" class="btn">contact us</a>
        </div>

    </div>

</section>



<section class="reviews">

    <h1 class="title">client's reviews</h1>

    <div class="box-container">
    <div class="box">
         <img src="images/pic-1.png" alt="">
         <p>Navigating through BookStrom website was a breeze! The search function was efficient, and I found exactly what I was looking for in no time. Plus, the checkout process was seamless. Highly recommend!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>john</h3>
      </div>

      <div class="box">
         <img src="images/pic-2.png" alt="">
         <p>I love shopping for books online, and BookStrom exceeded my expectations. The website design is beautiful and user-friendly, making it easy to explore new releases and bestsellers. The personalized recommendations were a nice touch too!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>         
        </div>
         <h3>Emily</h3>
      </div>

      <div class="box">
         <img src="images/pic-3.png" alt="">
         <p>I've tried several online bookstores, but BookStrom stands out for its vast selection and intuitive interface. Whether I'm browsing on my laptop or phone, I always enjoy the shopping experience. Plus, the quick delivery is a bonus!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Alex</h3>
      </div>

      <div class="box">
         <img src="images/pic-4.png" alt="">
         <p>I'm impressed by the customer service at BookStrom. I had a question about an order, and the support team responded promptly and professionally. It's reassuring to know that they're dedicated to ensuring a positive shopping experience for their customers.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Sarah</h3>
      </div>

      <div class="box">
         <img src="images/pic-5.png" alt="">
         <p>I stumbled upon BookStrom while searching for a specific title, and I'm so glad I did. The website is well-organized, and I appreciate the detailed book descriptions and reviews provided. I'll definitely be returning for my future book purchases!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Michael</h3>
      </div>

      <div class="box">
         <img src="images/pic-6.png" alt="">
         <p>Shopping for books online can sometimes feel impersonal, but [Your Bookshop's Name] adds a personal touch that sets it apart. The curated collections and themed recommendations make it easy to discover new reads, and I appreciate the effort they put into creating a welcoming online bookstore experience.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Laura</h3>
      </div>
    </div>

</section>

<section class="authors">

    <h1 class="title">great authors</h1>

    <div class="box-container">
    <div class="box">
         <img src="images/author-1.jpg" alt="">
         <div class="share">
            <a href="https://web.facebook.com/Backmanland/?_rdc=1&_rdr" class="fab fa-facebook-f"></a>
            <a href="https://twitter.com/backmanland" class="fab fa-twitter"></a>
            <a href="https://www.instagram.com/backmansk/" class="fab fa-instagram"></a>
         </div>
         <h3>Fredrik Backman</h3>
      </div>

      <div class="box">
         <img src="images/author-2.jpg" alt="">
         <div class="share">
            <a href="https://web.facebook.com/JKRowling/?_rdc=1&_rdr" class="fab fa-facebook-f"></a>
            <a href="https://twitter.com/jk_rowling" class="fab fa-twitter"></a>
            <a href="https://www.instagram.com/jkrowling_official/" class="fab fa-instagram"></a>
         </div>
         <h3>J.K. Rowling</h3>
      </div>

      <div class="box">
         <img src="images/author-3.jpg" alt="">
         <div class="share">
            <a href="https://web.facebook.com/chimamandaadichie/?_rdc=1&_rdr" class="fab fa-facebook-f"></a>
            <a href="https://twitter.com/chimamandareal" class="fab fa-twitter"></a>
            <a href="https://www.instagram.com/chimamanda_adichie/" class="fab fa-instagram"></a>
         </div>
         <h3>Chimamanda Ngozi Adichie</h3>
      </div>

      <div class="box">
         <img src="images/author-4.jpg" alt="">
         <div class="share">
            <a href="https://web.facebook.com/neilgaiman/?_rdc=1&_rdr" class="fab fa-facebook-f"></a>
            <a href="https://twitter.com/neilhimself" class="fab fa-twitter"></a>
            <a href="https://www.instagram.com/neilhimself/" class="fab fa-instagram"></a>
         </div>
         <h3>Neil Gaiman</h3>
      </div>

      <div class="box">
         <img src="images/author-5.jpg" alt="">
         <div class="share">
            <a href="https://web.facebook.com/celestengwriter/?_rdc=1&_rdr" class="fab fa-facebook-f"></a>
            <a href="https://twitter.com/pronounced_ing" class="fab fa-twitter"></a>
            <a href="https://www.instagram.com/pronounced_ing/" class="fab fa-instagram"></a>
         </div>
         <h3>Celeste Ng</h3>
      </div>

      <div class="box">
         <img src="images/author-6.jpg" alt="">
         <div class="share">
            <a href="https://web.facebook.com/pages/category/Author/Sally-Rooney-816390975364403/?_rdc=1&_rdr" class="fab fa-facebook-f"></a>
            <a href="https://twitter.com/sallyrooney" class="fab fa-twitter"></a>
            <a href="https://www.instagram.com/sallyrooneyofficial/" class="fab fa-instagram"></a>
         </div>
         <h3>Sally Rooney</h3>
      </div>
    </div>

</section>

@include('includes.footer')

<script src="{{ asset('js/script.js') }}"></script>

</body>
</html>
