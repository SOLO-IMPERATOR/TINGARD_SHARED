const copyBtn = document.querySelector('#copy-link');

copyBtn.addEventListener('click', () => {
    const
        copyText = document.querySelector('#myInput'),
        copyLink = document.location.href;
    copyText.value = copyLink;
    copyText.select();
    copyText.setSelectionRange(0, 99999)
    document.execCommand("copy");
    alert('Ссылка скопирована');
});