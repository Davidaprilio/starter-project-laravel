<!-- Alpine JS -->
<script defer src="https://unpkg.com/alpinejs@3.7.1/dist/cdn.min.js"></script>
<!-- Custom -->
<script>
    async function getApi(url) {
      return (await fetch(url)).json();
    }
    function createOption(el, data, firstSelect) {
      el.innerHTML = '';
      data.forEach(item => {
        const opt = document.createElement('option');
        opt.value = item.id;
        opt.innerText = item.name;
        el.appendChild(opt)
      });
      if (el.lenght > 0 && firstSelect) {
        el.options[0].setAttribute('selected', true)
      }
    }
</script>