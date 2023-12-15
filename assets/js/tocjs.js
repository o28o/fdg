const toggleButtons = document.querySelectorAll('.toggle-button');
const collapseAllBtn = document.getElementById('collapseAll');
const expandAllBtn = document.getElementById('expandAll');
const collapseButtons = document.querySelectorAll('[data-bs-toggle="collapse"]');
let isCollapsedAll = false;

toggleButtons.forEach((btn) => {
  btn.addEventListener('click', () => {
    const targetId = btn.getAttribute('data-bs-target');
    const targetCollapse = document.querySelector(targetId);
    if (targetCollapse && targetId !== '#navbarResponsive') {
      const isCollapsed = targetCollapse.classList.contains('show');
      btn.innerText = isCollapsed ? '+' : '-';
    }
  });
});

collapseAllBtn.addEventListener('click', () => {
  console.log('Collapse All Clicked');
  if (!isCollapsedAll) {
    collapseButtons.forEach((btn) => {
      const targetId = btn.getAttribute('data-bs-target');
      const targetCollapse = document.querySelector(targetId);
      if (targetCollapse && targetId !== '#navbarResponsive' && !targetCollapse.classList.contains('showkeep')) {
        if (!document.querySelector('#navbarResponsive.show')) {
          btn.click();
        }
      }
    });
    collapseAllBtn.innerText = '-';
    isCollapsedAll = true;
  } else {
    collapseButtons.forEach((btn) => {
      const targetId = btn.getAttribute('data-bs-target');
      const targetCollapse = document.querySelector(targetId);
      if (targetCollapse && targetId !== '#navbarResponsive' && targetCollapse.classList.contains('show') && !targetCollapse.classList.contains('showkeep')) {
        if (!document.querySelector('#navbarResponsive.show')) {
          btn.click();
        }
      }
    });
    collapseAllBtn.innerText = '+';
    isCollapsedAll = false;
  }
});

expandAllBtn.addEventListener('click', () => {
  console.log('Expand All Clicked');
  collapseButtons.forEach((btn) => {
    const targetId = btn.getAttribute('data-bs-target');
    const targetCollapse = document.querySelector(targetId);
    if (targetCollapse && targetId !== '#navbarResponsive' && !targetCollapse.classList.contains('show')) {
      if (!document.querySelector('#navbarResponsive.show')) {
        btn.click();
      }
    }
  });
  collapseAllBtn.innerText = '+';
  isCollapsedAll = false;
});
