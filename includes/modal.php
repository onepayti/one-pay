<?php
declare(strict_types=1);
?>

<div class="modal" id="modal-video" aria-hidden="true">
  <div class="modal__overlay" data-modal-close></div>
  <div class="modal__dialog" role="dialog" aria-modal="true" aria-labelledby="modal-video-title">
    <button type="button" class="modal__close" aria-label="Fechar vídeo" data-modal-close>&times;</button>
    <div class="modal__content">
      <h2 id="modal-video-title" class="sr-only">Manifesto OnePay</h2>
      <div class="modal__video">
        <iframe
          class="modal__iframe"
          data-default-src="https://www.youtube.com/embed/dQw4w9WgXcQ"
          src=""
          title="Manifesto OnePay"
          frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
          allowfullscreen></iframe>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const modal = document.querySelector('#modal-video');
    if (!modal) return;

    const iframe = modal.querySelector('.modal__iframe');
    const overlay = modal.querySelector('.modal__overlay');
    const closeButtons = modal.querySelectorAll('[data-modal-close]');
    const openers = document.querySelectorAll('[data-modal="video"]');
    const focusableSelectors = 'a[href], button, textarea, input, select, iframe';
    let previousActiveElement = null;

    const lockScroll = () => document.body.classList.add('modal-open');
    const unlockScroll = () => document.body.classList.remove('modal-open');

    const setIframeSrc = (src) => {
      if (!iframe) return;
      iframe.src = src;
    };

    const clearIframe = () => {
      if (!iframe) return;
      iframe.src = '';
    };

    const trapFocus = (event) => {
      if (!modal.classList.contains('is-open')) return;
      const focusables = [...modal.querySelectorAll(focusableSelectors)]
        .filter(el => !el.hasAttribute('disabled') && !el.getAttribute('aria-hidden'));
      if (focusables.length === 0) return;

      const first = focusables[0];
      const last = focusables[focusables.length - 1];

      if (event.target === last && event.key === 'Tab' && !event.shiftKey) {
        event.preventDefault();
        first.focus();
      } else if (event.target === first && event.key === 'Tab' && event.shiftKey) {
        event.preventDefault();
        last.focus();
      }
    };

    const openModal = (source) => {
      const videoSrc = source?.dataset?.videoSrc || iframe.dataset.defaultSrc;
      if (!videoSrc) return;
      previousActiveElement = document.activeElement;

      setIframeSrc(`${videoSrc}${videoSrc.includes('?') ? '&' : '?'}autoplay=1`);
      modal.classList.add('is-open');
      modal.setAttribute('aria-hidden', 'false');
      lockScroll();

      requestAnimationFrame(() => {
        const focusTarget = modal.querySelector('.modal__close');
        focusTarget?.focus();
      });
    };

    const closeModal = () => {
      modal.classList.remove('is-open');
      modal.setAttribute('aria-hidden', 'true');
      unlockScroll();
      clearIframe();
      previousActiveElement?.focus();
    };

    openers.forEach(opener => {
      opener.addEventListener('click', (event) => {
        event.preventDefault();
        openModal(opener);
      });
    });

    closeButtons.forEach(btn => btn.addEventListener('click', closeModal));
    overlay?.addEventListener('click', closeModal);

    document.addEventListener('keydown', (event) => {
      if (!modal.classList.contains('is-open')) return;
      if (event.key === 'Escape') {
        event.preventDefault();
        closeModal();
      } else if (event.key === 'Tab') {
        trapFocus(event);
      }
    });
  });
</script>
