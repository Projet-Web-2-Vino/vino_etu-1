
const selectTab = element => {
    const active = document.querySelector('.active');
    const visible = document.querySelector('.content-visible');
    const tabContent = document.getElementById(element.href.split('#')[1]);
    if (active) {
      active.classList.remove('active');
    }
    element.classList.add('active');
    if (visible) {
      visible.classList.remove('content-visible');
    }
    tabContent.classList.add('content-visible');
  }
  document.addEventListener('click', event => {
    if (event.target.matches('.tab-item a')) {
      selectTab(event.target);
    }
  }, false);
