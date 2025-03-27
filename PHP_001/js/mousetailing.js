        // 鼠标拖尾效果
        document.addEventListener('DOMContentLoaded', () => {
        const canvas = document.getElementById('trailCanvas');
        const ctx = canvas.getContext('2d');
        let particles = [];
        
        // 设置画布尺寸
        function resizeCanvas() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        }
        window.addEventListener('resize', resizeCanvas);
        resizeCanvas();
    
        // 粒子类
        class Particle {
            constructor(x, y) {
                this.x = x;
                this.y = y;
                this.size = Math.random() * 2 + 1;
                this.speedX = Math.random() * 3 - 1.5;
                this.speedY = Math.random() * 3 - 1.5;
                this.alpha = 1;
            }
            
            update() {
                this.x += this.speedX;
                this.y += this.speedY;
                this.alpha -= 0.03;
                this.size *= 0.95;
            }
            
            draw() {
                ctx.fillStyle = `rgba(0, 243, 255, ${this.alpha})`;
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                ctx.fill();
            }
        }
    
        // 动画循环
        function animate() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            
            particles.forEach((particle, index) => {
                particle.update();
                particle.draw();
                
                if (particle.alpha <= 0) {
                    particles.splice(index, 1);
                }
            });
            
            requestAnimationFrame(animate);
        }
        animate();
    
        // 鼠标移动事件
        let mouseX = 0;
        let mouseY = 0;
        window.addEventListener('mousemove', (e) => {
            mouseX = e.clientX;
            mouseY = e.clientY;
            
            // 创建新粒子
            for (let i = 0; i < 3; i++) {
                particles.push(new Particle(mouseX, mouseY));
            }
        });
        });