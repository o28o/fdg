
const toggleButtons = document.querySelectorAll('.toggle-button');

toggleButtons.forEach((btn) => {
  btn.addEventListener('click', () => {
    const targetId = btn.getAttribute('data-bs-target');
    const targetCollapse = document.querySelector(targetId);
    if (targetCollapse) {
      const isCollapsed = targetCollapse.classList.contains('show');
      if (btn.innerText === '+') {
        btn.innerText = '-';
      } else {
        btn.innerText = '+';
      }
    }
  });
});

  
    const collapseAllBtn = document.getElementById('collapseAll');
    const expandAllBtn = document.getElementById('expandAll');
    const collapseButtons = document.querySelectorAll('[data-bs-toggle="collapse"]');

    collapseAllBtn.addEventListener('click', () => {
      collapseButtons.forEach((btn) => {
        const targetId = btn.getAttribute('data-bs-target');
        const targetCollapse = document.querySelector(targetId);
        if (targetCollapse && !targetCollapse.classList.contains('collapsed')) {
          btn.click();
        }
      });
    });

    expandAllBtn.addEventListener('click', () => {
      collapseButtons.forEach((btn) => {
        const targetId = btn.getAttribute('data-bs-target');
        const targetCollapse = document.querySelector(targetId);
        if (targetCollapse && targetCollapse.classList.contains('collapsed')) {
          btn.click();
        }
      });
    });
