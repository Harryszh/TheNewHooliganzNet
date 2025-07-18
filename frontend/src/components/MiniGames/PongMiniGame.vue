<template>
  <div class="pong-container" @mousemove="movePaddle">
    <div class="ball" :style="{ top: ball.y + 'px', left: ball.x + 'px' }"></div>
    <div class="paddle" :style="{ left: paddleX + 'px' }"></div>
    <div class="score">🏆 Punkte: {{ score }}</div>
  </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';

const ball = ref({ x: 100, y: 100, dx: 3, dy: 3 });
const paddleX = ref(150);
const score = ref(0);
let interval = null;

const movePaddle = (e) => {
  const rect = e.currentTarget.getBoundingClientRect();
  paddleX.value = e.clientX - rect.left - 50;
};

const update = () => {
  ball.value.x += ball.value.dx;
  ball.value.y += ball.value.dy;

  // Wände
  if (ball.value.x <= 0 || ball.value.x >= 380) ball.value.dx *= -1;
  if (ball.value.y <= 0) ball.value.dy *= -1;

  // Paddle-Kollision
  if (
    ball.value.y >= 270 &&
    ball.value.x >= paddleX.value &&
    ball.value.x <= paddleX.value + 100
  ) {
    ball.value.dy *= -1;
    score.value++;
  }

  // Game Over
  if (ball.value.y > 300) {
    clearInterval(interval);
    alert(`🧨 Game Over! Punkte: ${score.value}`);
    resetGame();
  }
};

const resetGame = () => {
  ball.value = { x: 100, y: 100, dx: 3, dy: 3 };
  score.value = 0;
  interval = setInterval(update, 20);
};

onMounted(() => {
  interval = setInterval(update, 20);
});

onUnmounted(() => {
  clearInterval(interval);
});
</script>

<style scoped>
.pong-container {
  width: 400px;
  height: 300px;
  background: #1a1a1a;
  border: 4px solid #4caf50;
  margin: 50px auto;
  position: relative;
  overflow: hidden;
  cursor: none;
  border-radius: 10px;
}

.ball {
  width: 20px;
  height: 20px;
  background: #4caf50;
  border-radius: 50%;
  position: absolute;
}

.paddle {
  width: 100px;
  height: 15px;
  background: #ffffff;
  position: absolute;
  bottom: 10px;
  border-radius: 10px;
}

.score {
  position: absolute;
  top: 8px;
  right: 12px;
  color: #fff;
  font-size: 14px;
  font-family: sans-serif;
}
</style>
