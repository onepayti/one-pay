<?php
/** Carrossel de beneficios OnePay */
?>
<section class="section-carrossel">
  <div class="carrossel-container">
    <div class="carrossel-copy">
      <h2>Você no controle</h2>
      <p class="lead">Como parceiro OnePay, você gerencia sua operação com total autonomia:</p>
      <div class="no-desktop">
        <a class="cta cta--dark" href="<?php echo $ctaHref; ?>">Quero começar agora!</a>
      </div>
    </div>
    <div class="carrossel-content" data-carrossel>
      <div class="carrossel-track">
        <article class="carrossel-card">
          <span class="carrossel-icon" aria-hidden="true">
            <img src="images/prospeccao.svg">
          </span>
          <h3>Prospecção e negociação com lojistas</h3>
          <p>Defina sua margem e feche negócios como um verdadeiro dono.</p>
        </article>
        <article class="carrossel-card">
          <span class="carrossel-icon" aria-hidden="true">
            <img src="images/gestao.svg">
          </span>
          <h3>Gestão da sua carteira de clientes</h3>
          <p>Receita recorrente mês a mês.</p>
        </article>
        <article class="carrossel-card">
          <span class="carrossel-icon" aria-hidden="true">
            <img src="images/acompanhamento.svg">
          </span>
          <h3>Acompanhamento de faturamento</h3>
          <p>Relatórios em tempo real para decisões estratégicas.</p>
        </article>
        <article class="carrossel-card">
          <span class="carrossel-icon" aria-hidden="true">
            <img src="images/criacao.svg">
          </span>
          <h3>Criação da sua equipe de vendedores</h3>
          <p>Escalabilidade e crescimento sustentável na sua operação.</p>
        </article>
      </div>
      <div class="carrossel-controls">
        <a class="carrossel-arrow prev" data-carrossel-prev aria-label="Anterior">
          <span aria-hidden="true">&lsaquo;</span>
        </a>
        <div class="carrossel-dots" data-carrossel-dots role="tablist" aria-label="Benef&iacute;cios OnePay"></div>
        <a class="carrossel-arrow next" data-carrossel-next aria-label="Pr&oacute;ximo">
          <span aria-hidden="true">&rsaquo;</span>
        </a>
      </div>
    </div>
    <div class="no-mobile">
      <a class="cta cta--dark" href="<?php echo $ctaHref; ?>">Quero começar agora!</a>
    </div>
  </div>
</section>

<style>
  .section-carrossel {
    background: var(--white-onepay);
    padding: clamp(5rem, 5vw, 10rem) 0;
    color: var(--black-onepay);
  }

  .carrossel-container {
    max-width: 128.6rem;
    margin: 0 auto;
    padding: 0 clamp(2rem, 5vw, 2rem);
    display: grid;
    gap: clamp(3rem, 6vw, 6rem);
  }

  .carrossel-copy {
    max-width: 350px;
    display: grid;
    gap: 2.5rem;
  }

  .carrossel-kicker {
    font-size: clamp(1.6rem, 2vw, 1.8rem);
    font-weight: 600;
    letter-spacing: 0.05em;
    text-transform: uppercase;
    color: var(--blue-onepay);
    margin: 0;
  }

  .carrossel-copy h2 {
    font-weight: var(--weight-433);
  }

  .carrossel-content {
    display: grid;
    gap: 2.4rem;
    position: relative;
    overflow: hidden;
    --peek: clamp(4rem, 10vw, 8rem);
    margin-right: calc(var(--peek) * -1);
    padding-right: var(--peek);
  }

  .carrossel-track {
    display: flex;
    gap: 1.4rem;
    scroll-behavior: smooth;
    scroll-snap-type: x mandatory;
    scrollbar-width: none;
    flex: 1;
    overflow-x: auto;
    overflow-y: hidden;
    transition: transform 0.4s ease-in-out;
    will-change: transform;
  }

  .carrossel-track>* {
    flex-shrink: 0;
    width: 100%;
    /* ajuste para o tamanho do slide */
  }

  .carrossel-track::-webkit-scrollbar {
    display: none;
  }

  .carrossel-card {
    /* max-width: 31.8rem; */
    padding: 2rem;
    display: grid;
    gap: 1.2rem;
    color: var(--black-onepay);
    scroll-snap-align: start;
    transition: transform .45s cubic-bezier(.22, .61, .36, 1), box-shadow .45s cubic-bezier(.22, .61, .36, 1);
    border-radius: 20px;
    background: rgba(255, 255, 255, 0.49);
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;
    flex: 0 0 calc(50% - 1.2rem);
  }

  .carrossel-card:hover {
    transform: translateY(-6px);
  }

  .carrossel-card h3 {
    font-size: var(--fs-p);
    line-height: var(--lh-p);
    color: var(--blue-onepay);
    font-weight: var(--weight-753);
    width: 80%;
  }

  .carrossel-card p {
    font-size: var(--fs-p);
    line-height: var(--lh-p);
    color: var(--black-onepay);
    font-weight: var(--weight-198);
  }

  .carrossel-controls {
    display: inline-flex;
    align-items: center;
    gap: 1.2rem;
    justify-content: flex-start;
  }

  .carrossel-arrow {
    border: none;
    background: transparent;
    color: var(--blue-onepay);
    font-size: 2.4rem;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: background .3s ease, color .3s ease, transform .3s ease;
  }

  .carrossel-arrow[disabled] {
    opacity: 0.45;
    cursor: not-allowed;
    pointer-events: none;
  }

  .carrossel-arrow:hover,
  .carrossel-arrow:focus-visible {
    background: var(--blue-onepay);
    color: var(--white-onepay);
    transform: translateY(-2px);
  }

  .carrossel-dots {
    display: inline-flex;
    gap: 0.8rem;
  }

  .carrossel-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: rgba(20, 53, 84, 0.26);
    transition: transform .3s ease, background .3s ease;
  }

  .carrossel-dot.is-active {
    background: var(--blue-onepay);
    transform: scale(1.45);
  }

  @media (min-width: 768px) {
    .carrossel-container {
      grid-template-columns: minmax(0, 0.6fr) minmax(0, 1.1fr);
      align-items: center;
    }
  }

  @media (max-width:768px) {
    .carrossel-card {
      /* flex: 0 0 calc(90% - 1.2rem); */
      flex: 0 0 100%;
    }
  }
</style>

<script>
  (function () {
    const carrossel = document.querySelector('[data-carrossel]');
    if (!carrossel) return;

    const track = carrossel.querySelector('.carrossel-track');
    const slides = Array.from(track.children);
    const prevButton = carrossel.querySelector('[data-carrossel-prev]');
    const nextButton = carrossel.querySelector('[data-carrossel-next]');
    const dotsWrapper = carrossel.querySelector('[data-carrossel-dots]');

    if (!slides.length) return;

    let currentIndex = 0;

    const createDots = () => {
      dotsWrapper.innerHTML = '';
      const total = getMaxIndex() + 1;

      for (let i = 0; i < total; i++) {
        const dot = document.createElement('a');
        dot.className = 'carrossel-dot' + (i === currentIndex ? ' is-active' : '');
        dot.setAttribute('aria-label', `Ir para slide ${i + 1}`);
        dot.addEventListener('click', () => goTo(i));
        dotsWrapper.appendChild(dot);
      }
    };

    const getGap = () => {
      const styles = window.getComputedStyle(track);
      const gapValue = styles.columnGap || styles.gap || '0';
      return parseFloat(gapValue) || 0;
    };

    const slidesPerView = () => {
      const gap = getGap();
      const slideWidth = slides[0].getBoundingClientRect().width;
      const available = track.clientWidth;
      const total = slideWidth + gap;
      const perView = Math.max(1, Math.floor(available / total));
      return Math.min(perView, slides.length);
    };

    const getMaxIndex = () => Math.max(0, slides.length - slidesPerView());

    const goTo = (index) => {
      const maxIndex = getMaxIndex();
      currentIndex = Math.max(0, Math.min(index, maxIndex));

      const slideWidth = slides[0].getBoundingClientRect().width;
      const gap = getGap();
      const offset = currentIndex * (slideWidth + gap);

      // Usa transform para mover os slides
      track.scrollLeft = offset;

      updateControls();
    };


    const updateControls = () => {
      const dots = dotsWrapper.querySelectorAll('.carrossel-dot');
      dots.forEach((dot, index) => {
        dot.classList.toggle('is-active', index === currentIndex);
      });

      const maxIndex = getMaxIndex();
      if (prevButton) prevButton.disabled = currentIndex === 0;
      if (nextButton) nextButton.disabled = currentIndex === maxIndex;
    };

    const handleScroll = () => {
      const gap = getGap();
      const slideWidth = slides[0].getBoundingClientRect().width;
      if (!slideWidth) return;
      const total = slideWidth + gap;
      const index = Math.round(track.scrollLeft / total);
      const bounded = Math.max(0, Math.min(index, getMaxIndex()));
      if (bounded !== currentIndex) {
        currentIndex = bounded;
        updateControls();
      }
    };

    prevButton?.addEventListener('click', () => goTo(currentIndex - 1));
    nextButton?.addEventListener('click', () => goTo(currentIndex + 1));

    track.addEventListener('scroll', handleScroll, { passive: true });

    window.addEventListener('resize', () => {
      createDots();
      goTo(Math.min(currentIndex, getMaxIndex()));
    });

    createDots();
    updateControls();
  })();
</script>