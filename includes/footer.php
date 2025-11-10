<footer class="rodape">
  <div class="container">
    <div class="rodape__top">
      <div class="rodape__col rodape__col--brand">
        <div class="rodape__logo"><img src="images/logo-azul-onepay.svg" alt="OnePay" /></div>
      </div>
      <div class="rodape__col rodape__col--social">
        <p class="rodape__social-title">Acompanhe nas redes:</p>
        <ul class="rodape__social-list">
          <li><a href="https://www.facebook.com/profile.php?id=61578161810964"
              title="Siga-nos no Facebook da OnePay"><img src="images/facebook.svg" alt="Facebook" /></a></li>
          <li><a href="https://www.instagram.com/onepayoficial" title="Siga-nos no Instagram da OnePay"><img
                src="images/instagram.svg" alt="Instagram" /></a></li>
          <li><a href="https://www.linkedin.com/company/onepayoficial/" title="Siga-nos no Linkedin da OnePay"><img
                src="images/linkedin.svg" alt="Linkedin" /></a></li>
        </ul>
      </div>
    </div>
    <hr class="rodape__divider" />
    <div class="rodape__middle">
      <div class="rodape__col rodape__col--links">
        <div class="rodape__links-group">
          <h3>Mapa do Site</h3>
          <nav class="rodape__nav"> <a href="/">One Pay</a> <a href="lojistas">Para o Lojista</a>
            <a href="licenciados">Para o Representante</a>
          </nav>
        </div>
        <div class="rodape__links-group">
          <h3>Transparência</h3>
          <nav class="rodape__nav"> 
            <a href="politicas-de-privacidade">Políticas de Privacidade</a> 
            <a href="termos-de-uso">Termos de Uso</a> 
        </nav>
        </div>
      </div>
      <div class="rodape__col rodape__col--contact">
        <h3>Central de Relacionamento</h3>
        <p>9h às 18h - Segunda à sexta, exceto feriados</p>

        <div class="rodape__card">
          <img src="images/mail.svg" alt="Email" class="rodape__card-icon" />
          <div>
            <p class="lead">Contatos</p>
            <p>adm@1pay.com.br</p>
            <p>(11) 96575-9045</p>
          </div>
        </div>
      </div>
    </div>
    <p class="rodape__info">© 2025 One Pay Intermediações LTDA | CNPJ 60.391.818/0001-04 - São Paulo - SP
    </p>
    <hr class="rodape__divider" />
  </div>
</footer>

<?php /* include __DIR__ . '/modal.php' */ ?>

<script>
  const toggle = document.querySelector('.menu__toggle');
  const overlay = document.querySelector('.menu__overlay');
  const closeBtn = document.querySelector('.menu__close');

  toggle.addEventListener('click', () => overlay.classList.add('active'));
  closeBtn.addEventListener('click', () => overlay.classList.remove('active'));
</script>


<script>
  window.addEventListener("load", function () {
    window.cookieconsent.initialise({
      palette: {
        popup: { background: "#F2F2F1" },
        button: { background: "#618DB7" }
      },
      theme: "classic",
      content: {
        message: "Este site usa cookies para garantir a melhor experiência.",
        dismiss: "Entendi",
        link: "Saiba mais",
        href: "termos-de-uso"
      }
    })
  });
</script>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const siteHost = window.location.host;

    document.querySelectorAll('a[href^="http"]').forEach(anchor => {
      try {
        const url = new URL(anchor.href);
        if (url.host && url.host !== siteHost) {
          anchor.setAttribute('target', '_blank');
          anchor.setAttribute('rel', 'noopener noreferrer');
        }
      } catch (err) {
        // Ignora links inválidos
      }
    });
  });
</script>

</body>

</html>
