<div id="project{{ $project->id }}" class="project wow animate__animated animate__fadeInUp" data-wow-offset="10" data-wow-delay="{{ ($k + 1) * 0.3 }}s" style="background: url({{ asset($image) }})">
    <div class="grad"></div>
    <h3>{{ $project->head }}</h3>
</div>
