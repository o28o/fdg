
  const toggleButtons = document.querySelectorAll('.toggle-button');
  const collapseAllBtn = document.getElementById('collapseAll');
  const expandAllBtn = document.getElementById('expandAll');
  const collapseButtons = document.querySelectorAll('[data-bs-toggle="collapse"]');
  let isCollapsedAll = false;

  toggleButtons.forEach((btn) => {
    btn.addEventListener('click', () => {
      const targetId = btn.getAttribute('data-bs-target');
      const targetCollapse = document.querySelector(targetId);
      if (targetCollapse) {
        const isCollapsed = targetCollapse.classList.contains('show');
        if (isCollapsed) {
          btn.innerText = '+';
        } else {
          btn.innerText = '-';
        }
      }
    });
  });

  collapseAllBtn.addEventListener('click', () => {
    if (!isCollapsedAll) {
      collapseButtons.forEach((btn) => {
        const targetId = btn.getAttribute('data-bs-target');
        const targetCollapse = document.querySelector(targetId);
        if (targetCollapse && !targetCollapse.classList.contains('showkeep')) {
          btn.click();
        }
      });
      collapseAllBtn.innerText = '-';
      isCollapsedAll = true;
    } else {
      collapseButtons.forEach((btn) => {
        const targetId = btn.getAttribute('data-bs-target');
        const targetCollapse = document.querySelector(targetId);
        if (targetCollapse && targetCollapse.classList.contains('show') && !targetCollapse.classList.contains('showkeep')) {
          btn.click();
        }
      });
      collapseAllBtn.innerText = '+';
      isCollapsedAll = false;
    }
  });

  expandAllBtn.addEventListener('click', () => {
    collapseButtons.forEach((btn) => {
      const targetId = btn.getAttribute('data-bs-target');
      const targetCollapse = document.querySelector(targetId);
      if (targetCollapse && !targetCollapse.classList.contains('show')) {
        btn.click();
      }
    });
    collapseAllBtn.innerText = '+';
    isCollapsedAll = false;
  });
