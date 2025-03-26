function createParticles() {
    const container = document.querySelector('.bg-effects');
    for(let i = 0; i < 4; i++)
    {
        const particle = document.createElement('div');
        particle.className = 'particle';
        particle.style.cssText = 
        `
            width: ${300 + Math.random()*200}px;
            height: ${300 + Math.random()*200}px;
            background: linear-gradient(45deg, 
                hsl(${Math.random()*360}, 70%, 50%),
                hsl(${Math.random()*360}, 70%, 50%)
            );
            top: ${Math.random()*100}%;
            left: ${Math.random()*100}%;
            animation-delay: -${Math.random()*20}s;
        `;
        container.appendChild(particle);
    }
}
createParticles();