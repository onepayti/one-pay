<section class="feature journey-section">
  <div class="container">
    <div class="featurebox journey-wrapper">
      <header class="journey-header">
        <h2 class="journey-heading">Entenda como funciona a <span>Jornada OnePay:</span></h2>
        <p class="lead">Criamos uma jornada de crescimento com metas e recompensas para impulsionar o seu
          neg&oacute;cio.</p>
      </header>

      <div class="journey-slider" data-journey>
        <div class="journey-track">
          <article class="journey-card">
            <div class="journey-media">
              <img src="images/representante-iniciante.png" alt="N&iacute;vel 1 - Iniciante" loading="lazy" />
            </div>
            <div class="journey-details">
              <h3>Iniciante</h3>
              <p>No in&iacute;cio, voc&ecirc; ter&aacute; a oportunidade de desenvolver habilidades valiosas em vendas e
                comunica&ccedil;&atilde;o, essenciais para qualquer carreira. Al&eacute;m disso, a oportunidade de ser
                dono
                do seu neg&oacute;cio, gerenciando seu tempo de forma eficiente.</p>
            </div>
          </article>
          <article class="journey-card">
            <div class="journey-media">
              <img src="images/representante-corredor.png" alt="N&iacute;vel 2 - Corredor" loading="lazy" />
            </div>
            <div class="journey-details">
              <h3>Corredor</h3>
              <p>Nessa fase, voc&ecirc; assume desafios maiores e acelera resultados com metas claras e acompanhamento
                constante. Recebe suporte dedicado e materiais exclusivos para alavancar seu crescimento financeiro.</p>
            </div>
          </article>
          <article class="journey-card">
            <div class="journey-media">
              <img src="images/representante-atleta.png" alt="N&iacute;vel 3 - Atleta" loading="lazy" />
            </div>
            <div class="journey-details">
              <h3>Atleta</h3>
              <p>Com performance elevada, voc&ecirc; lidera opera&ccedil;&otilde;es e constr&oacute;i equipes. Recebe
                mentorias estrat&eacute;gicas e participa de programas especiais para ampliar a carteira e a
                recorr&ecirc;ncia.</p>
            </div>
          </article>
          <article class="journey-card">
            <div class="journey-media">
              <img src="images/representante-bolt.png" alt="N&iacute;vel 4 - Bolt" loading="lazy" />
            </div>
            <div class="journey-details">
              <h3>Bolt</h3>
              <p>O topo da jornada: voc&ecirc; lidera regi&otilde;es inteiras com modelo escal&aacute;vel, participa de
                iniciativas exclusivas e ganha visibilidade nacional, potencializando a rentabilidade do seu
                neg&oacute;cio.</p>
            </div>
          </article>
        </div>

        <div class="journey-timeline" data-journey-timeline>
          <div class="journey-timeline__rail">
            <span class="journey-timeline__fill" data-journey-fill></span>
            <button type="button" class="journey-step is-active" data-step="0" aria-label="Ir para Iniciante">
              <span class="journey-step__dot"></span>
              <span class="journey-step__label">Iniciante</span>
            </button>
            <button type="button" class="journey-step" data-step="1" aria-label="Ir para Corredor">
              <span class="journey-step__dot"></span>
              <span class="journey-step__label">Corredor</span>
            </button>
            <button type="button" class="journey-step" data-step="2" aria-label="Ir para Atleta">
              <span class="journey-step__dot"></span>
              <span class="journey-step__label">Atleta</span>
            </button>
            <button type="button" class="journey-step" data-step="3" aria-label="Ir para Bolt">
              <span class="journey-step__dot"></span>
              <span class="journey-step__label">Bolt</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
  .journey-section {
    margin: clamp(4rem, 6vw, 8rem) auto;
  }

  .journey-wrapper {
    display: grid;
    gap: clamp(3.6rem, 5vw, 5.6rem);
  }

  .journey-header {
    text-align: center;
    display: grid;
    gap: 1.6rem;
  }

  .journey-heading {
    margin: 0;
  }

  .journey-heading span {
    font-weight: var(--weight-559);
  }

  .journey-subtitle {
    margin: 0;
    font-size: clamp(1.6rem, 2.4vw, 1.9rem);
    line-height: 1.6;
    color: rgba(242, 242, 241, 0.82);
  }

  .journey-slider {
    display: grid;
    gap: clamp(3.2rem, 5vw, 4.4rem);
  }

  .journey-track {
    display: flex;
    gap: clamp(2.4rem, 6vw, 4.8rem);
    overflow-x: auto;
    overflow-y: hidden;
    scroll-snap-type: x mandatory;
    padding-bottom: 1rem;
    scrollbar-width: none;
  }

  .journey-track::-webkit-scrollbar {
    display: none;
  }

  .journey-card {
    flex: 0 0 100%;
    min-width: min(100%, 680px);
    scroll-snap-align: center;
    display: grid;
    gap: clamp(2rem, 3.6vw, 4rem);
    align-items: center;
  }

  @media (min-width: 768px) {
    .journey-card {
      grid-template-columns: minmax(0, 0.9fr) minmax(0, 1.1fr);
    }
  }

  @media (max-width: 599px) {
    .journey-timeline__rail::before, .journey-timeline__fill {
      top: 1.5rem !important;
    }
  }

  .journey-media {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .journey-section .lead {
    max-width: 695px;
    margin: 0 auto;
  }

  .journey-section .featurebox {
    background: var(--gradient-onepay)
  }

  .journey-media img {
    max-width: min(280px, 70vw);
    height: auto;
  }

  .journey-details {
    display: grid;
    gap: clamp(1.2rem, 2.4vw, 2.4rem);
    text-align: left;
    max-width: 43.6rem;
  }

  .journey-details h3 {
    font-size: var(--fs-h2);
    font-weight: var(--weight-559);
    line-height: var(--lh-h2);
  }

  .journey-details p {
    font-size: var(--fs-p);
    font-weight: var(--weight-198);
    line-height: var(--lh-p);
  }

  .journey-timeline {
    display: grid;
    gap: 1.6rem;
  }

  .journey-timeline__rail {
    position: relative;
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    align-items: center;
    gap: clamp(1.2rem, 3vw, 3.2rem);
    padding: 0 0.4rem;
  }

  .journey-timeline__rail::before {
    content: "";
    position: absolute;
    left: 3%;
    right: 3%;
    top: 2.2rem;
    height: 4px;
    background: rgba(255, 255, 255, 0.12);
    border-radius: 999px;
  }

  .journey-timeline__fill {
    position: absolute;
    left: 3%;
    top: 2.2rem;
    height: 4px;
    width: calc(var(--journey-progress, 0) * 94%);
    background: rgba(255, 255, 255, 0.6);
    border-radius: 999px;
    transition: width 0.4s ease;
  }

  .journey-step {
    position: relative;
    background: none;
    border: 0;
    color: rgba(242, 242, 241, 0.7);
    font: inherit;
    display: grid;
    justify-items: center;
    gap: 1.2rem;
    cursor: pointer;
    padding: 0;
    min-width: 0;
    text-align: center;
    transition: color 0.3s ease;
  }

  .journey-step__dot {
    width: clamp(2.4rem, 3vw, 5.2rem);
    height: clamp(2.4rem, 3vw, 5.2rem);
    border-radius: 50%;
    background: #153760;
    border: 16px solid transparent;
    transition: transform 0.3s ease, background 0.3s ease, border-color 0.3s ease;
  }

  .journey-step__label {
    font-size: var(--fs-h3);
    font-weight: var(--weight-198, 600);
    white-space: nowrap;
  }

  .journey-step.is-active,
  .journey-step:focus-visible,
  .journey-step:hover {
    color: #ffffff;
  }

  .journey-step.is-active .journey-step__dot,
  .journey-step:focus-visible .journey-step__dot,
  .journey-step:hover .journey-step__dot {
    background: #ffffff;
    border-color: rgba(0, 25, 55, 0.45);
    transform: scale(1.08);
  }

  .journey-mobile-hint {
    margin: 0;
    font-size: 1.4rem;
    text-align: center;
    color: rgba(255, 255, 255, 0.58);
  }

  @media (min-width: 992px) {
    .journey-mobile-hint {
      display: none;
    }
  }

  @media (min-width: 992px) {
    .journey-section .featurebox {
      padding: 8rem 6rem;
    }
  }
</style>

<script>
  (function () {
    const root = document.querySelector('[data-journey]');
    if (!root) return;

    const track = root.querySelector('.journey-track');
    const slides = Array.from(track.children);
    const timeline = root.querySelector('[data-journey-timeline]');
    const fill = root.querySelector('[data-journey-fill]');
    const steps = Array.from(root.querySelectorAll('.journey-step'));

    if (!slides.length || !steps.length) return;

    let currentIndex = 0;
    let slideOffsets = [];

    const updateOffsets = () => {
      slideOffsets = slides.map((slide) => slide.offsetLeft);
    };

    const goTo = (index) => {
      const maxIndex = slides.length - 1;
      currentIndex = Math.max(0, Math.min(index, maxIndex));
      const offset = slideOffsets[currentIndex] || 0;
      track.scrollTo({
        left: offset,
        behavior: 'smooth'
      });
      updateUI();
    };

    const updateUI = () => {
      steps.forEach((step, idx) => {
        step.classList.toggle('is-active', idx === currentIndex);
        step.setAttribute('aria-pressed', idx === currentIndex ? 'true' : 'false');
      });

      const progress = currentIndex / Math.max(1, slides.length - 1);
      if (fill) {
        fill.parentElement.style.setProperty('--journey-progress', progress);
      }
    };

    const handleScroll = () => {
      const scrollLeft = track.scrollLeft;
      const distances = slideOffsets.map((offset) => Math.abs(offset - scrollLeft));
      const closestIndex = distances.indexOf(Math.min(...distances));
      if (closestIndex !== currentIndex) {
        currentIndex = closestIndex;
        updateUI();
      }
    };

    steps.forEach((step) => {
      step.addEventListener('click', () => goTo(Number(step.dataset.step)));
      step.addEventListener('keydown', (event) => {
        if (event.key === 'Enter' || event.key === ' ') {
          event.preventDefault();
          goTo(Number(step.dataset.step));
        }
      });
    });

    track.addEventListener('scroll', handleScroll, { passive: true });
    window.addEventListener('resize', () => {
      updateOffsets();
      goTo(currentIndex);
    });

    updateOffsets();
    updateUI();
  })();
</script>