</main>

<!-- Footer-->
<footer class="bg-dark py-4 mt-auto">
    <div class="container px-5">
        <div class="row align-items-center justify-content-between flex-column flex-sm-row">
            <div class="col-auto">
                <div class="small m-0 text-white">Copyright &copy; RouteToCode {{ date('Y') }}</div>
            </div>
            <div class="col-auto">
                {{-- <a class="link-light small" href="#!">Privacy Policy</a>
                <span class="text-white mx-1">&middot;</span>
                <a class="link-light small" href="#!">Terms of Service</a>
                <span class="text-white mx-1">&middot;</span> --}}
                <a class="link-light small" href="{{ route('front.contact.view') }}">Contact Us</a>
            </div>
        </div>
    </div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="{{ asset('front') }}/js/scripts.js"></script>
</body>

</html>
