@foreach ($detailportfolio as $d )
<div class="col-5 col-md-3 karya mb-4 position-relative">
    <div class="overlay-porto text-center">
        <h3 class="text-white font-bold">{{$d->Portofolio->title}}</h3>
        <p class="text-white">Client Name ({{ \Carbon\Carbon::parse($d->Portofolio->publish_date)->format('Y') }})</p>
    </div>
    <img src="{{asset('storage/images/portofolio/'.'/'.$d->portofolio_id.'/'.$d->media)}}" alt="Team Tekenens" width="100%" height="auto">
</div>
@endforeach


