<section class="outdoor dashboard-section">
    <div class="container dashboard-wrapper">
        <div class="dashboard-content">
            <div class="dashboard-graph no-desktop">
                <h3 class="dashboard-graph__title">Evolução da comissão e acumulado - OnePay</h3>
                <canvas class="onepayChart" aria-label="Grafico de crescimento de comissao" role="img"></canvas>
                <div class="dashboard-legend">
                    <span class="legend-item">
                        <span class="legend-dot legend-dot--month"></span>
                        COMISSÃO DO MÊS (R$)
                    </span>
                    <span class="legend-item">
                        <span class="legend-dot legend-dot--total"></span>
                        ACUMULADO (R$)
                    </span>
                </div>
            </div>
            <div class="dashboard-copy">
                <h2>Com a <b>OnePay</b>, você <b>lucra todo mes!</b></h2>
                <p class="lead">Quanto maior sua carteira e a movimentacao dos seus clientes, maior seu comissionamento.
                </p>
                <div class="dashboard-graph no-mobile">
                    <h3 class="dashboard-graph__title">Evolução da comissão e acumulado - OnePay</h3>
                    <canvas class="onepayChart" aria-label="Grafico de crescimento de comissao" role="img"></canvas>
                    <div class="dashboard-legend">
                        <span class="legend-item">
                            <span class="legend-dot legend-dot--month"></span>
                            COMISSÃO DO MÊS (R$)
                        </span>
                        <span class="legend-item">
                            <span class="legend-dot legend-dot--total"></span>
                            ACUMULADO (R$)
                        </span>
                    </div>
                </div>
                <div class="dashboard-note">
                    <h4>Voce define sua margem:</h4>
                    <p>Nosso modelo de markup garante liberdade para negociar com seus clientes.</p>
                </div>
                <div class="dashboard-note">
                    <h4>Renda recorrente:</h4>
                    <p>Cada transacao ativa da sua base gera receita continua pra voce.</p>
                </div>
            </div>
        </div>

        <hr class="dashboard-separator" />

        <div class="dashboard-metrics">
            <div class="metrics-track">
                <article class="metric-card">
                    <strong>100</strong>
                    <span>Reuniões<br> por mês</span>
                </article>
                <article class="metric-card">
                    <strong>5</strong>
                    <span>Apresentações<br> por dia</span>
                </article>
                <article class="metric-card" style="min-width: 127px;">
                    <strong>10%</strong>
                    <span>de Conversão<br> em vendas</span>
                </article>
                <article class="metric-card" style="width: 135px;">
                    <strong>10</strong>
                    <span>Novos clientes<br> por mês</span>
                </article>
                <article class="metric-card seta no-desktop">
                    <img src="images/seta.svg">
                </article>
                <article class="metric-card metric-card--highlight">
                    <span class="metric-card__label">Ganho aproximado de</span>
                    <strong>R$ 1.200</strong>
                    <span>em 6 meses de trabalho</span>
                </article>
            </div>
        </div>
    </div>
</section>

<style>
    .outdoor.dashboard-section {
        padding: 10rem 2rem;
    }

    .dashboard-section {
        margin: clamp(4rem, 6vw, 8rem) auto;
    }

    .dashboard-wrapper {
        display: grid;
        gap: clamp(3.6rem, 6vw, 5.6rem);
    }

    .dashboard-content {
        display: grid;
        gap: clamp(3rem, 5vw, 5rem);
    }

    @media (min-width: 992px) {
        .dashboard-content {
            grid-template-columns: minmax(0, 1.5fr) minmax(0, 1fr);
            align-items: center;
        }
    }

    .dashboard-graph {
        padding: clamp(2.4rem, 4vw, 3.6rem);
        position: relative;
        overflow: hidden;
        max-width: 589px;
    }

    .dashboard-graph canvas {
        width: 100% !important;
        height: auto !important;
        aspect-ratio: 16 / 10;
    }

    .dashboard-graph__title {
        margin: 0 0 2rem;
        font-size: clamp(0.7rem, 2.2vw, 1.6rem);
        font-weight: var(--weight-433, 500);
        color: rgba(242, 242, 241, 0.85);
    }

    .dashboard-legend {
        display: flex;
        flex-wrap: wrap;
        gap: 1.4rem;
        margin-top: 2.4rem;
        font-size: clamp(0.5rem, 2.2vw, 1.2rem);
        color: rgba(242, 242, 241, 0.7);
    }

    .legend-item {
        display: inline-flex;
        align-items: center;
        gap: 0.8rem;
    }

    .legend-dot {
        width: clamp(0.5rem, 2.2vw, 1.2rem);
        height: clamp(0.5rem, 2.2vw, 1.2rem);
        border-radius: 50%;
        display: inline-block;
    }

    .legend-dot--month {
        background: #5eb2ff;
    }

    .legend-dot--total {
        background: rgba(94, 178, 255, 0.45);
    }

    .dashboard-copy {
        display: grid;
        gap: clamp(1.6rem, 3vw, 2.4rem);
        max-width: 44.5rem;
    }

    .dashboard-copy h2 b {
        font-weight: var(--weight-559);
    }

    .dashboard-note h4 {
        margin: 0 0 0.6rem;
        color: var(--grey-onepay);
        font-size: var(--fs-p);
        font-weight: var(--weight-559);
        line-height: var(--lh-p);
    }

    .dashboard-note p {
        margin: 0 0 0.6rem;
        color: var(--white-onepay);
        font-size: var(--fs-p);
        font-weight: var(--weight-198);
        line-height: var(--lh-p);
        max-width: 31rem;
    }

    .dashboard-separator {
        width: 100%;
        border: 0;
        height: 3px;
        background: #fff;
    }

    .dashboard-metrics {
        position: relative;
        display: grid;
        gap: 2rem;
    }

    .metrics-track {
        display: grid;
        grid-auto-flow: column;
        grid-auto-columns: minmax(220px, 1fr);
        gap: 6.5rem;
        overflow-x: auto;
        scroll-snap-type: x mandatory;
        scroll-padding: 1.2rem;
        padding-bottom: 0.6rem;
        scrollbar-width: none;
        align-items: center;
    }

    .metrics-track::-webkit-scrollbar {
        display: none;
    }

    @media (min-width: 992px) {
        .metrics-track {
            overflow: visible;
            grid-auto-columns: 1fr;
        }
    }

    @media (max-width: 900px) {
        .metrics-track {
            grid-template-columns: repeat(2, 1fr);
            gap: 5rem;
            grid-auto-flow: dense;
        }

        .metrics-track> :nth-child(6) {
            grid-column: 1 / -1;
        }
    }


    .metric-card {
        /* scroll-snap-align: center;
        padding: clamp(1.8rem, 3vw, 2.4rem);
        /* display: grid; */
        gap: 0.8rem;
        */
    }

    .metric-card.seta {
        justify-content: center;
        display: flex;
    }

    .metric-card strong {
        color: #618DB7;
        font-size: clamp(6.3rem, 3vh, 7.6rem);
        font-family: JUST Sans Variable;
        font-weight: 753;
        line-height: 65px;
        word-wrap: break-word;
        display: block;
    }

    .metric-card span {
        color: #F2F2F1;
        font-size: var(--fs-p);
        font-weight: 300;
        line-height: var(--lh-p);
        word-wrap: break-word
    }

    .metric-card--highlight {
        justify-items: flex-start;
        text-align: left;
    }

    .metric-card--highlight .metric-card__label {
        font-size: 1.4rem;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        color: rgba(235, 241, 249, 0.7);
    }

    .metric-card--highlight strong {
        width: 32.6rem;
    }

    .metrics-controls {
        display: flex;
        justify-content: flex-end;
        gap: 1.2rem;
    }

    .metrics-arrow {
        width: 4.2rem;
        height: 4.2rem;
        border-radius: 50%;
        border: 1px solid rgba(255, 255, 255, 0.35);
        background: transparent;
        color: #ffffff;
        cursor: pointer;
        transition: transform 0.3s ease, background 0.3s ease;
    }

    .metrics-arrow:hover,
    .metrics-arrow:focus-visible {
        transform: translateY(-2px);
        background: rgba(255, 255, 255, 0.18);
    }

    @media (min-width: 992px) {
        .metrics-controls {
            display: none;
        }
    }

    @media (max-width: 992px) {

        .dashboard-graph {
            padding: 0;
        }
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
    (function initializeCharts() {
        const canvases = document.querySelectorAll('.onepayChart'); // selecione pelo nome da classe
        if (!canvases.length || !window.Chart) return;

        canvases.forEach((canvas) => {
            const ctx = canvas.getContext('2d');

            const gradientFill = ctx.createLinearGradient(0, 0, 0, 320);
            gradientFill.addColorStop(0, 'rgba(94, 178, 255, 0.55)');
            gradientFill.addColorStop(1, 'rgba(94, 178, 255, 0)');

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['INÍCIO', '12º MÊS', '24º MÊS'],
                    datasets: [
                        {
                            label: 'COMISSÃO DO MÊS (R$)',
                            data: [0, 75000, 300000],
                            borderColor: '#5EB2FF',
                            backgroundColor: gradientFill,
                            fill: true,
                            tension: 0.35,
                            pointBackgroundColor: '#5EB2FF',
                            pointRadius: 6,
                            pointHoverRadius: 7,
                            borderWidth: 3
                        },
                        {
                            label: 'ACUMULADO (R$)',
                            data: [0, 22000, 54000],
                            borderColor: 'rgba(94, 178, 255, 0.45)',
                            backgroundColor: 'transparent',
                            fill: false,
                            tension: 0.35,
                            pointBackgroundColor: 'rgba(94, 178, 255, 0.6)',
                            pointRadius: 5,
                            pointHoverRadius: 6,
                            borderWidth: 2
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    aspectRatio: 16 / 9,
                    animation: {
                        duration: 1200,
                        easing: 'easeOutQuart'
                    },
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: 'rgba(10, 27, 52, 0.9)',
                            titleColor: '#ffffff',
                            bodyColor: '#d5e9ff',
                            borderColor: 'rgba(94, 178, 255, 0.55)',
                            borderWidth: 1,
                            padding: 12,
                            displayColors: false
                        }
                    },
                    scales: {
                        x: {
                            ticks: {
                                color: 'rgba(235, 241, 249, 0.75)',
                                font: { size: 12 }
                            },
                            grid: {
                                color: 'rgba(255, 255, 255, 0.06)',
                                lineWidth: 1
                            }
                        },
                        y: {
                            ticks: {
                                color: 'rgba(235, 241, 249, 0.6)',
                                font: { size: 12 },
                                callback: (value) => value.toLocaleString('pt-BR')
                            },
                            grid: {
                                color: 'rgba(255, 255, 255, 0.06)',
                                lineWidth: 1
                            },
                            suggestedMax: 320000
                        }
                    }
                }
            });
        });
    })();


    // Função para animar números de zero até o valor final no strong
    function animateCounter(element) {
        const text = element.textContent.trim();
        // Detecta se começa com "R$"
        const temReal = text.startsWith('R$');
        // Extrai o número (remove tudo que não for dígito ou vírgula)
        const numeroRaw = text.replace(/[^\d,]/g, '').replace(',', '.');
        const number = parseFloat(numeroRaw);
        if (isNaN(number)) return;

        let start = 0;
        const duration = 2000;
        const startTime = performance.now();

        function update(time) {
            const elapsed = time - startTime;
            let progress = Math.min(elapsed / duration, 1);
            const current = Math.floor(progress * number);

            // Formatação com separador e prefixo "R$"
            if (temReal) {
                element.textContent = 'R$ ' + current.toLocaleString('pt-BR');
            } else if (text.includes('%')) {
                element.textContent = current + '%';
            } else {
                element.textContent = current.toLocaleString('pt-BR');
            }

            if (progress < 1) {
                requestAnimationFrame(update);
            }
        }

        requestAnimationFrame(update);
    }


    // Observer para ativar animação só quando o contêiner estiver visível
    const observer = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Animar todos os strong dentro do container
                entry.target.querySelectorAll('strong').forEach(animateCounter);

                // Aqui você pode chamar a função de inicializar os gráficos
                // initializeCharts(); // por exemplo

                obs.unobserve(entry.target); // só anima uma vez
            }
        });
    }, { threshold: 0.5 });

    const dashboardMetrics = document.querySelector('.dashboard-metrics');
    if (dashboardMetrics) {
        observer.observe(dashboardMetrics);
    }


</script>