

var playCatch = new TimelineMax({repeat:-1})
playCatch.to('#ball', .5, {bezier:{curviness:1.5, values:[{x:85, y:-70}, {x:175, y:0}]}, ease:Linear.easeInOut})
.to('circle:nth-child(1)',.5,{scale:.75,strokeWidth:'2px',transformOrigin:'50% 50%',ease:Elastic.easeOut},'-=.5')
.to('circle:nth-child(2)',.5,{scale:1,strokeWidth:'5px',transformOrigin:'50% 50%',ease:Elastic.easeOut},'-=.5')
.to('#ball', .5, {bezier:{curviness:1.5, values:[{x:85, y:-70}, {x:0, y:0}]}, ease:Linear.easeInOut})
.to('circle:nth-child(2)',.5,{scale:.75,strokeWidth:'2px',transformOrigin:'50% 50%',ease:Elastic.easeOut},'-=.5')
.to('circle:nth-child(1)',.5,{scale:1,strokeWidth:'5px',transformOrigin:'50% 50%',ease:Elastic.easeOut},'-=.5')

 TweenMax.to('svg',5,{rotation:360,ease:Linear.easeInOut,transformOrigin:'50% 50%',repeat:-1})

