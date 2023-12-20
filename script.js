document.addEventListener("DOMContentLoaded", () => {
  
  const icons = {
  dark: '<svg class="w-6 h-6 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" /></svg>',
  light: '<svg class="w-6 h-6 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd" /></svg>',
  system: '<svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M0 12c0 6.627 5.373 12 12 12s12-5.373 12-12-5.373-12-12-12-12 5.373-12 12zm2 0c0-5.514 4.486-10 10-10v20c-5.514 0-10-4.486-10-10z" clip-rule="evenodd" /></svg>'
};
  
  
  
  window
      .matchMedia('(prefers-color-scheme: dark)')
      .addListener((e) => {
        console.log('called dark')
        if (e.matches && !localStorage.theme) {
          switchTheme('systemDark')
        }
      });

    window
      .matchMedia('(prefers-color-scheme: light)')
      .addListener((e) => {
        console.log('called light')
        if (e.matches && !localStorage.theme) {
          switchTheme('systemLight');
        }
      });

    const dark = document.getElementById('dark');
    const light = document.getElementById('light');
    const system = document.getElementById('system');
const bodyTag = document.body;

    const switchTheme = (theme) => {
      let htmlClasses = document
        .querySelector('html')
        .classList;
      if (theme === 'dark') {
        localStorage.theme = 'dark';
        htmlClasses.add('dark');
        htmlClasses.remove('light');
        
            bodyTag.classList.add("dark");
      document.documentElement.setAttribute("data-bs-theme", "dark");
          localStorage.setItem("darkSwitch", "dark");
      document.body.setAttribute("data-theme", "dark");
        
        system
          .classList
          .add('text-gray-400');
        system
          .classList
          .remove('text-blue-400');
        system
          .classList
          .remove('text-yellow-500');
        light
          .classList
          .add('text-gray-400');
        light
          .classList
          .remove('text-yellow-500');
        dark
          .classList
          .add('text-blue-400');
        dark
          .classList
          .remove('text-gray-400');
      } else if (theme === 'light') {
        localStorage.theme = 'light';
        htmlClasses.add('light');
        htmlClasses.remove('dark');
        
          bodyTag.classList.remove("dark");
      document.documentElement.setAttribute("data-bs-theme", "light");
      localStorage.removeItem("darkSwitch");
      document.body.removeAttribute("data-theme");
        
        
        system
          .classList
          .add('text-gray-400');
        system
          .classList
          .remove('text-blue-400');
        system
          .classList
          .remove('text-yellow-500');
        light
          .classList
          .add('text-yellow-500');
        light
          .classList
          .remove('text-gray-400');
        dark
          .classList
          .add('text-gray-400');
        dark
          .classList
          .remove('text-blue-400');
      } else if (theme === 'systemDark') {
        localStorage.removeItem('theme');
        htmlClasses.add('dark');
        htmlClasses.remove('light');
        
           bodyTag.classList.add("dark");
      document.documentElement.setAttribute("data-bs-theme", "dark");
          localStorage.setItem("darkSwitch", "dark");
      document.body.setAttribute("data-theme", "dark");
        
        system
          .classList
          .add('text-blue-400');
        system
          .classList
          .remove('text-gray-400');
        system
          .classList
          .remove('text-yellow-500');
        light
          .classList
          .add('text-gray-400');
        light
          .classList
          .remove('text-yellow-500');
        dark
          .classList
          .add('text-gray-400');
        dark
          .classList
          .remove('text-blue-400');
      } else {
        localStorage.removeItem('theme');
        htmlClasses.add('light');
        htmlClasses.remove('dark');
        
           bodyTag.classList.remove("dark");
      document.documentElement.setAttribute("data-bs-theme", "light");
      localStorage.removeItem("darkSwitch");
      document.body.removeAttribute("data-theme");
        
        system
          .classList
          .add('text-yellow-500');
        system
          .classList
          .remove('text-gray-400');
        system
          .classList
          .remove('text-blue-400');
        light
          .classList
          .add('text-gray-400');
        light
          .classList
          .remove('text-yellow-500');
        dark
          .classList
          .add('text-gray-400');
        dark
          .classList
          .remove('text-blue-400');
      }
    };
    if (localStorage.theme === 'dark') {
      switchTheme('dark');
    } else if (localStorage.theme === 'light') {
      switchTheme('light');
    } else {
      if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
        switchTheme('systemDark');
      } else {
        switchTheme('systemLight');
      }
    }

    dark.addEventListener('click', () => {
      switchTheme('dark');
    });

    light.addEventListener('click', () => {
      switchTheme('light');
    });

    system.addEventListener('click', () => {
      localStorage.removeItem('theme');
      if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
        switchTheme('systemDark');
      } else {
        switchTheme('systemLight');
      }
    });
});


