@foreach ($detailportfolio as $d )
<div class="col-5 col-md-3 karya mb-4 position-relative w-4 h-4 detailporto" data-aos="zoom-in" role="button" data-id="{{$d->id}}">
    <div class="overlay-porto text-center">
        <h2 class="text-white font-bold">{{$d->Portofolio->title}}</h2>
        <p class="text-white">Client Name ({{ \Carbon\Carbon::parse($d->Portofolio->publish_date)->format('Y') }})</p>
    </div>
    <img src="{{asset('storage/images/portofolio/'.'/'.$d->portofolio_id.'/'.$d->media)}}" alt="Team Tekenens" width="auto" height="100%">
</div>
@endforeach


