<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Slide TV</title>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    html, body {
      width: 100%;
      height: 100%;
      overflow: hidden;
      background-color: #000;
      font-family: Arial, sans-serif;
    }

    .carousel {
      position: relative;
      width: 100%;
      height: 100vh;
      overflow: hidden;
    }

    .carousel img {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100vh;
      object-fit: cover;
      opacity: 0;
      transition: opacity 2s ease-in-out;
    }

    .carousel img.active {
      opacity: 1;
    }

    /* Indicadores */
    .indicators {
      position: absolute;
      bottom: 30px;
      left: 50%;
      transform: translateX(-50%);
      display: flex;
      gap: 12px;
    }

    .indicator {
      width: 12px;
      height: 12px;
      border-radius: 50%;
      background-color: rgba(255,255,255,0.5);
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .indicator.active {
      background-color: #fff;
    }
  </style>
</head>
<body>
  <div class="carousel">
    @forelse($slides as $slide)
      <img src="{{ asset('storage/' .$slide->url) }}" alt="{{$slide->name}}" {{ $loop->first ? 'class=active' : '' }} />
    @empty
      <img src="{{ asset('img/default.jpeg') }}" alt="SECULT" class="active" />
    @endforelse
    <div class="indicators"></div> 
  </div>

  <script>
    const images = document.querySelectorAll('.carousel img');
    const indicatorsContainer = document.querySelector('.indicators');

    let index = 0;

    // Criar indicadores dinamicamente
    images.forEach((_, i) => {
      const dot = document.createElement('div');
      dot.classList.add('indicator');
      if (i === 0) dot.classList.add('active');
      dot.addEventListener('click', () => showSlide(i));
      indicatorsContainer.appendChild(dot);
    });

    const indicators = document.querySelectorAll('.indicator');

    function showSlide(i) {
      images[index].classList.remove('active');
      indicators[index].classList.remove('active');
      index = i;
      images[index].classList.add('active');
      indicators[index].classList.add('active');
    }

    function nextSlide() {
      const next = (index + 1) % images.length;
      showSlide(next);
    }

    setInterval(nextSlide, 120000);
  </script>

</body>
</html>