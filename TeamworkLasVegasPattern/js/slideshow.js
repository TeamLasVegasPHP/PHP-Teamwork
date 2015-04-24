var step=1;
function slideit()
{
    document.images.slide.src = eval("image"+step+".src");
    if(step<6)
        step++;
    else
        step=1;
    setTimeout("slideit()",3500);
}
slideit();