(function () {
  const slides = [...document.querySelectorAll('.slide')];
  const dots = [...document.querySelectorAll('.hero-dot')];
  if (slides.length) {
    let current = 0;
    const n = slides.length;
    function show(i) {
      current = (i + n) % n;
      slides.forEach((s, k) => s.classList.toggle('active', k === current));
      dots.forEach((s, k) => s.classList.toggle('active', k === current));
    }
    const prev = document.querySelector('#prev');
    const next = document.querySelector('#next');
    if (prev) prev.addEventListener('click', () => show(current - 1));
    if (next) next.addEventListener('click', () => show(current + 1));
    dots.forEach((d, i) => d.addEventListener('click', () => show(i)));
    setInterval(() => show(current + 1), 7000);
  }

  const toggle = document.querySelector('#menuToggle');
  const nav = document.querySelector('#siteNav');
  if (toggle && nav) {
    toggle.addEventListener('click', () => {
      const open = nav.classList.toggle('is-open');
      toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
    nav.querySelectorAll('.nav-item > .nav-link').forEach((link) => {
      link.addEventListener('click', (e) => {
        if (window.matchMedia('(max-width: 1100px)').matches) {
          const item = link.parentElement;
          if (item && item.querySelector('.mega')) {
            e.preventDefault();
            item.classList.toggle('is-open');
          }
        }
      });
    });
  }

  const searchToggle = document.querySelector('#searchToggle');
  const searchPanel = document.querySelector('#searchPanel');
  const searchInput = document.querySelector('#siteSearch');
  if (searchToggle && searchPanel) {
    searchToggle.addEventListener('click', () => {
      const open = searchPanel.hasAttribute('hidden') ? true : false;
      searchPanel.toggleAttribute('hidden', !open);
      searchToggle.setAttribute('aria-expanded', open ? 'true' : 'false');
      if (open && searchInput) searchInput.focus();
    });
  }

  const officialToggle = document.querySelector('#officialToggle');
  const officialMenu = document.querySelector('#officialMenu');
  if (officialToggle && officialMenu) {
    officialToggle.addEventListener('click', () => {
      const open = officialMenu.hasAttribute('hidden');
      officialMenu.toggleAttribute('hidden', !open);
      officialToggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
    document.addEventListener('click', (e) => {
      if (!e.target.closest('.official-wrap')) {
        officialMenu.setAttribute('hidden', '');
        officialToggle.setAttribute('aria-expanded', 'false');
      }
    });
  }

  const sizeBtns = [...document.querySelectorAll('.text-size [data-size]')];
  const applySize = (size) => {
    document.documentElement.dataset.text = size;
    localStorage.setItem('eac_text_size', size);
    sizeBtns.forEach((b) => b.classList.toggle('is-active', b.dataset.size === size));
  };
  const savedSize = localStorage.getItem('eac_text_size') || 'm';
  if (sizeBtns.length) applySize(savedSize);
  sizeBtns.forEach((btn) => btn.addEventListener('click', () => applySize(btn.dataset.size)));


  const trackerFilter = document.querySelector('#trackerFilter');
  const trackerTable = document.querySelector('#trackerTable');
    if (trackerFilter && trackerTable) {
        trackerFilter.addEventListener('change', () => {
            const value = trackerFilter.value;
            trackerTable.querySelectorAll('[data-status]').forEach((row) => {
                row.hidden = value !== '' && row.dataset.status !== value;
            });
        });
    }

  const docSearch = document.querySelector('#docSearch');
  const docTable = document.querySelector('#docTable');
  const docEmpty = document.querySelector('#docEmpty');
  if (docSearch && docTable) {
    docSearch.addEventListener('input', () => {
      const q = docSearch.value.trim().toLowerCase();
            let visible = 0;
            docTable.querySelectorAll('.doc-card').forEach((row) => {
                const match = row.textContent.toLowerCase().includes(q);
                row.hidden = !match;
                if (match) visible += 1;
            });
      if (docEmpty) docEmpty.hidden = visible !== 0;
    });
    if (docSearch.value) docSearch.dispatchEvent(new Event('input'));
  }

  const oppFilter = document.querySelector('#oppFilter');
  const oppCards = document.querySelector('#oppCards');
  const oppEmpty = document.querySelector('#oppEmpty');
  if (oppFilter && oppCards) {
    const applyOppFilter = (type) => {
      let visible = 0;
      oppCards.querySelectorAll('.opp-card').forEach((card) => {
        const match = type === '' || card.dataset.type === type;
        card.hidden = !match;
        if (match) visible += 1;
      });
      if (oppEmpty) oppEmpty.hidden = visible !== 0;
    };
    const active = oppFilter.querySelector('.chip.is-active');
    if (active && active.dataset.type) applyOppFilter(active.dataset.type);
    oppFilter.addEventListener('click', (e) => {
      const btn = e.target.closest('[data-type]');
      if (!btn) return;
      oppFilter.querySelectorAll('.chip').forEach((c) => c.classList.remove('is-active'));
      btn.classList.add('is-active');
      applyOppFilter(btn.dataset.type);
    });
  }
})();
