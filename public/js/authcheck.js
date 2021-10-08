function auth(url, message)
{
    const URL=url;
    window.onload=()=>{
        if(document.getElementById('navbarDropdown')!=null && document.referrer.match(URL)){
        alert(message+"されました");
        }
    }
}    