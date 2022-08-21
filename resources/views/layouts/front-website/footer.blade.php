<section>
        <div class="gradient-footer"></div>
    </section>


    <!-- START: Footer -->
    <footer class="footer-web px-2 py-3 px-md-2 py-md-3 px-lg-5 py-lg-5">
        <div class="row container justify-content-between mx-md-auto gap-5 gap-md-0">
            <div class="col-12 col-md-3">
                <img src="../../assets/images/logo-footer.png" alt="Logo Tekenens" width="60%" height="auto">
            </div>
            <!-- <div class="col-md-1"></div> -->
            <div class="col-12 col-md-4">
                <h3 class="font-bold footer-title" data-aos="zoom-in-up" data-aos-delay="1000" data-aos-duration="800">OUR INFO</h3>
                <div class="row" data-aos="zoom-out-up" data-aos-delay="1200" data-aos-duration="800">
                    <div class="col-2">
                        <img src="../../assets/images/location-icon.png" alt="Location Tekenens Studio" width="21px" height="auto">
                    </div>
                    <div class="col">
                    <p>{{$data->address}} </p>
                    </div>
                </div>
                <hr class="footer">
                <div class="row" data-aos="zoom-out-up" data-aos-delay="1200" data-aos-duration="800">
                    <div class="col-2">
                        <img src="../../assets/images/email-icon.png" alt="Location Tekenens Studio" width="21px" height="auto">
                    </div>
                    <div class="col">
                    <a href="/">{{$data->email}}</a >
                    </div>
                </div>
                <hr class="footer mt-3">
                <div class="row" data-aos="zoom-out-up" data-aos-delay="1200" data-aos-duration="800">
                    <div class="col-2">
                        <img src="../../assets/images/whatsapp-icon.png" alt="Location Tekenens Studio" width="21px" height="auto">
                    </div>
                    <div class="col">
                    <a href="/">{{$data->whatsapp}}</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <h3 class="font-bold footer-title" data-aos="zoom-in-up" data-aos-delay="1000" data-aos-duration="800">FOLLOW US</h3>
                <div class="row" data-aos="zoom-out-up" data-aos-delay="1200" data-aos-duration="800">
                    <div class="col-2">
                        <img src="../../assets/images/instagram-icon.png" alt="Location Tekenens Studio" width="21px" height="auto">
                    </div>
                    <div class="col">
                    <p>{{$data->instagram}}</p>
                    </div>
                </div>
                <hr class="footer">
                <div class="row" data-aos="zoom-out-up" data-aos-delay="1200" data-aos-duration="800">
                    <div class="col-2">
                        <img src="../../assets/images/youtube-icon.png" alt="Location Tekenens Studio" width="21px" height="auto">
                    </div>
                    <div class="col">
                    <a href="/">{{$data->youtube}}</a >
                    </div>
                </div>
            </div>
            <!-- <div class="col-12 col-md-3">
                <h3 class="font-bold footer-title">OTHER LINK</h3>
                <p>Surabaya Indonesia</p>
            </div> -->
        </div>
        <div class="copyright px-3 pt-2">
        <p>Copyright © {{$date}}. Tekenens Studio. All Rights Reserved.<br>Powered by Diferso Agency</p>
    </div>
    </footer>
