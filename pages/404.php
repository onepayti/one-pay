<main class="page-404">

  <section class="page-404__hero hero">
    <div class="container page-404__grid">
      <div class="page-404__copy">
        <span class="page-404__tag">Erro 404 </span>
        <h1>Ops! Nao encontramos a pagina que voce procura.</h1>
        <p class="lead">
          O endereco pode ter sido digitado incorretamente ou o conteudo foi movido.
          Escolha uma das opcoes abaixo para continuar navegando com a OnePay.
        </p>

        <div class="page-404__actions">
          <a class="cta cta--light" href="/">Voltar para a pagina inicial</a>
          <a class="cta cta--dark" href="<?php echo $ctaHref; ?>">Falar com o time OnePay</a>
        </div>
      </div>

      <div class="page-404__illustration" aria-hidden="true">
        <div class="page-404__bubble page-404__bubble--primary"></div>
        <div class="page-404__bubble page-404__bubble--secondary"></div>
        <span class="page-404__code">404</span>
      </div>
    </div>
  </section>

  <section class="page-404__links">
    <div class="container page-404__links-grid">
      <article class="page-404__card">
        <h2>Sou Licenciado</h2>
        <p>Descubra como potencializar as vendas e ganhar recorrencia comandando sua propria operacao.</p>
        <a class="cta cta--dark" href="/licenciados">Conhecer a area de licenciados</a>
      </article>

      <article class="page-404__card">
        <h2>Sou Lojista</h2>
        <p>Veja como a maquininha OnePay ajuda a vender mais, reduzir custos e dar autonomia ao seu negocio.</p>
        <a class="cta cta--dark" href="/lojistas">Quero ser um lojista OnePay</a>
      </article>

      <article class="page-404__card">
        <h2>Políticas e Termos</h2>
        <p>Consulte nossas politicas de privacidade, termos de uso e informacoes regulatórias sempre que precisar.</p>
        <a class="cta cta--dark" href="/politicas-de-privacidade">Acessar politicas e termos</a>
      </article>
    </div>
  </section>


</main>

<style>

  .page-404 {
    display: grid;
    gap: clamp(4rem, 6vw, 6rem);
    padding: clamp(6rem, 8vw, 8rem) 0 clamp(4rem, 6vw, 6rem);
    color: var(--black-onepay);
    background: var(--blue-onepay);
  }

  .page-404__grid {
    display: grid;
    gap: clamp(3rem, 6vw, 6rem);
    align-items: center;
  }

  @media (min-width: 960px) {
    .page-404__grid {
      grid-template-columns: minmax(0, 0.9fr) minmax(0, 1.1fr);
    }
  }

  .page-404__tag {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 1.3rem;
    font-weight: 600;
    letter-spacing: .08em;
    text-transform: uppercase;
    color: var(--blue-onepay);
    background: rgba(20, 53, 84, .08);
    border-radius: 999px;
    padding: .6rem 1.6rem;
    margin-bottom: 1.6rem;
  }

  .page-404__copy h1 {
    font-size: clamp(2.8rem, 4vw, 3.8rem);
    line-height: 1.2;
    font-weight: var(--weight-433, 600);
    margin-bottom: 1.6rem;
  }

  .page-404__actions {
    display: flex;
    flex-wrap: wrap;
    gap: 1.2rem;
    margin-top: 2.4rem;
  }

  .page-404__illustration {
    position: relative;
    min-height: 280px;
  }

  .page-404__bubble {
    position: absolute;
    border-radius: 50%;
    filter: drop-shadow(0 20px 40px rgba(20, 53, 84, .2));
  }

  .page-404__bubble--primary {
    width: clamp(160px, 30vw, 240px);
    height: clamp(160px, 30vw, 240px);
    background: linear-gradient(135deg, var(--blue-onepay), #58a0ff);
    top: 10%;
    left: 10%;
  }

  .page-404__bubble--secondary {
    width: clamp(120px, 24vw, 200px);
    height: clamp(120px, 24vw, 200px);
    background: rgba(20, 53, 84, .12);
    bottom: 0;
    right: 5%;
  }

  .page-404__code {
    position: absolute;
    inset: 0;
    margin: auto;
    display: grid;
    place-items: center;
    font-size: clamp(4rem, 10vw, 8rem);
    font-weight: 700;
    color: rgba(255, 255, 255, .85);
    mix-blend-mode: overlay;
  }

  .page-404__links {
    background: rgba(20, 53, 84, .04);
    padding: clamp(4rem, 6vw, 6rem) 0;
  }

  .page-404__links-grid {
    display: grid;
    gap: clamp(2rem, 4vw, 3rem);
  }

  @media (min-width: 900px) {
    .page-404__links-grid {
      grid-template-columns: repeat(3, minmax(0, 1fr));
    }
  }

  .page-404__card {
    background: var(--white-onepay);
    border-radius: 18px;
    padding: clamp(2.4rem, 4vw, 3rem);
    box-shadow: 0 16px 32px rgba(20, 53, 84, .08);
    display: grid;
    gap: 1.6rem;
  }

  .page-404__card h2 {
    font-size: clamp(1.8rem, 3vw, 2.2rem);
    font-weight: 600;
  }

  .page-404__card p {
    color: rgba(18, 38, 62, 0.72);
    line-height: 1.55;
  }

  .page-404__help {
    padding: 0 0 clamp(2rem, 4vw, 4rem);
  }

  .page-404__help-grid {
    display: grid;
    gap: 2rem;
    align-items: center;
    background: linear-gradient(135deg, rgba(20, 53, 84, .92), rgba(31, 87, 153, .88));
    border-radius: 20px;
    padding: clamp(2.8rem, 5vw, 3.6rem);
    color: #fff;
  }

  @media (min-width: 900px) {
    .page-404__help-grid {
      grid-template-columns: minmax(0, 1.2fr) minmax(0, 0.8fr);
    }
  }

  .page-404__help-actions {
    display: flex;
    flex-wrap: wrap;
    gap: 1.2rem;
    justify-content: flex-end;
  }

  .page-404__help .cta--light {
    color: var(--blue-onepay);
    background: #fff;
  }
</style>
