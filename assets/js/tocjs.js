        const toggleButtons = document.querySelectorAll('.toggle-button');
        const collapseAllBtn = document.getElementById('collapseAll');
        const expandAllBtn = document.getElementById('expandAll');
        const collapseButtons = document.querySelectorAll('[data-bs-toggle="collapse"]');
        let isCollapsedAll = false;

        function saveCollapseState() {
            const state = {};
            collapseButtons.forEach(function (btn) {
                const targetId = btn.getAttribute('data-bs-target');
                const targetCollapse = document.querySelector(targetId);
                if (targetCollapse) {
                    state[targetId] = targetCollapse.classList.contains('show');
                }
            });
            localStorage.setItem('collapseState', JSON.stringify(state));
        }

        function restoreCollapseState() {
            const stateJSON = localStorage.getItem('collapseState');
            if (stateJSON) {
                const state = JSON.parse(stateJSON);
                collapseButtons.forEach(function (btn) {
                    const targetId = btn.getAttribute('data-bs-target');
                    const targetCollapse = document.querySelector(targetId);
                    if (targetCollapse && state[targetId]) {
                        btn.click();
                    }
                });
            }
        }

        window.addEventListener('beforeunload', saveCollapseState);

        restoreCollapseState();

        toggleButtons.forEach(function (btn) {
            btn.addEventListener('click', function () {
                const targetId = btn.getAttribute('data-bs-target');
                const targetCollapse = document.querySelector(targetId);
                if (targetCollapse) {
                    const isCollapsed = targetCollapse.classList.contains('show');
                    if (isCollapsed) {
                        btn.innerText = '+';
                    } else {
                        btn.innerText = '-';
                    }
                    saveCollapseState();
                }
            });
        });

        collapseAllBtn.addEventListener('click', function () {
            if (!isCollapsedAll) {
                collapseButtons.forEach(function (btn) {
                    const targetId = btn.getAttribute('data-bs-target');
                    const targetCollapse = document.querySelector(targetId);
                    if (targetCollapse && !targetCollapse.classList.contains('showkeep')) {
                        btn.click();
                    }
                });
                collapseAllBtn.innerText = '-';
                isCollapsedAll = true;
            } else {
                collapseButtons.forEach(function (btn) {
                    const targetId = btn.getAttribute('data-bs-target');
                    const targetCollapse = document.querySelector(targetId);
                    if (targetCollapse && targetCollapse.classList.contains('show') && !targetCollapse.classList.contains('showkeep')) {
                        btn.click();
                    }
                });
                collapseAllBtn.innerText = '+';
                isCollapsedAll = false;
            }
            saveCollapseState();
        });

        expandAllBtn.addEventListener('click', function () {
            collapseButtons.forEach(function (btn) {
                const targetId = btn.getAttribute('data-bs-target');
                const targetCollapse = document.querySelector(targetId);
                if (targetCollapse && !targetCollapse.classList.contains('show')) {
                    btn.click();
                }
            });
            collapseAllBtn.innerText = '+';
            isCollapsedAll = false;
            saveCollapseState();
        });
