function display_comment(id_news)
{
    console.log(id_news);
    var commentaire = document.getElementById('news_display_'+id_news);
    
    if (commentaire.style.display == 'none')
    {
        commentaire.style.display = 'block';
    }
    else
    {
        commentaire.style.display = 'none';
    }
}