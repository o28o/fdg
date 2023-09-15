const toggleButtons = document.querySelectorAll('.toggle-button');

toggleButtons.forEach(function(btn) {
  btn.addEventListener('click', function() {
    const targetId = btn.getAttribute('data-bs-target');
    const targetCollapse = document.querySelector(targetId);
    if (targetCollapse) {
      const isCollapsed = targetCollapse.classList.contains('show');
      if (btn.innerText === '+') {
        btn.innerText = '-';
        // Сохраняем состояние в localStorage
        localStorage.setItem(targetId, 'expanded');
      } else {
        btn.innerText = '+';
        // Сохраняем состояние в localStorage
        localStorage.setItem(targetId, 'collapsed');
      }
    }
  });
});

const collapseAllBtn = document.getElementById('collapseAll');
const expandAllBtn = document.getElementById('expandAll');
const collapseButtons = document.querySelectorAll('[data-bs-toggle="collapse"]');

collapseAllBtn.addEventListener('click', function() {
  collapseButtons.forEach(function(btn) {
    const targetId = btn.getAttribute('data-bs-target');
    const targetCollapse = document.querySelector(targetId);
    if (targetCollapse && !targetCollapse.classList.contains('collapsed')) {
      btn.click();
      // Обновляем состояние в localStorage
      localStorage.setItem(targetId, 'collapsed');
    }
  });
});

expandAllBtn.addEventListener('click', function() {
  collapseButtons.forEach(function(btn) {
    const targetId = btn.getAttribute('data-bs-target');
    const targetCollapse = document.querySelector(targetId);
    if (targetCollapse && targetCollapse.classList.contains('collapsed')) {
      btn.click();
      // Обновляем состояние в localStorage
      localStorage.setItem(targetId, 'expanded');
    }
  });
});

// Восстанавливаем состояние при загрузке страницы
collapseButtons.forEach(function(btn) {
  const targetId = btn.getAttribute('data-bs-target');
  const targetCollapse = document.querySelector(targetId);
  const savedState = localStorage.getItem(targetId);
  if (savedState === 'expanded') {
    btn.click();
  }
});
