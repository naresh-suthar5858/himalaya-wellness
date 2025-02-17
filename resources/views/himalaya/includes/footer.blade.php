<footer class="footer bg-light text-black py-4 ">
    <div class="container">
        <div class="row">
            <!-- About Section -->
            <div class="col-md-4">
                <h5>About Us</h5>
                <p>
                    Yogesh Enterprises is a leading platform for high-quality products. Opened in 2022, our mission is
                    to deliver the best to our customers.
                </p>
            </div>

            <!-- Links Section -->
            <div class="col-md-4">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('homepage') }}" class="text-black text-decoration-none">Home</a></li>
                    <li><a href="{{ route('category') }}" class="text-black text-decoration-none">Products</a></li>
                    @foreach (Footpages() as $page)
                        <li><a href="{{ route('showPage-',$page->url_key) }}" class="text-black text-decoration-none">{{$page->title}}</a></li>
                    @endforeach
                    <li><a href="{{ route('contact') }}" class="text-black text-decoration-none">Contact</a></li>
                    <li><a href="{{ route('about') }}" class="text-black text-decoration-none">About</a></li>
                </ul>
            </div>

            <!-- Contact Section -->
            <div class="col-md-4">
                <h5>Contact Us</h5>
                <p>
                    Address: Yogesh Enterpriese , Balaji Marcket Sardarshahar<br>
                    Phone: +91 6376932766<br> +91 7073900667

                </p>
            </div>
        </div>

        <div class="text-center mt-3">
            <p>&copy; 2024 Yogesh Enterprises. All rights reserved.</p>
            <p> Developed by- <a href="https://www.instagram.com/_naresh.here/">Naresh</a></p>
        </div>
    </div>
</footer>





<!-- script  -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
</script>
