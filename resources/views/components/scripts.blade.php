<style>
  .img-photo {
    background-position: center;
    background-repeat: no-repeat; 
    background-size: cover;
  }
  .skeleton {
    opacity: .7;
    animation: skeleton-loading 1s linear infinite alternate;
  }
  .skeleton-text {
    width: 100%;
    height: .5rem;
    margin-bottom: .25rem;
    border-radius: .125rem;
  }
  .skeleton-text:last-child {
    margin-bottom: 0;
    width: 80%;
  }
  @keyframes skeleton-loading {
    0% {
      background-color:  hsl(200, 20%, 70%);
    }
    100% {
      background-color: hsl(200, 20%, 95%);
    }
  }
  .title {
    text-transform: capitalize;
    max-width: 100%;
    word-wrap: none;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
    /*flex-grow: 1;*/
  }
</style>
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

    function previewImage(fileIn, elImg) {
      console.log(fileIn, elImg)
      const oFReader = new FileReader();
      oFReader.readAsDataURL(fileIn.files[0]);
      oFReader.onload = function(oFREvent) {
        const imgPrev = document.querySelector(elImg);
        imgPrev.style.backgroundImage = `url('${oFREvent.target.result}')`;
      }
    }

    function previewRemoveImage(elImg) {
      const imgPrev = document.querySelector(elImg);
      imgPrev.style.backgroundImage = `url('https://ui-avatars.com/api/?name=david%20aprilio&color=7F9CF5&background=EBF4FF')`;
    }


</script>