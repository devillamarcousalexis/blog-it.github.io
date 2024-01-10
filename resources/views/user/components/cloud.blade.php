<style>
body {
    margin: 0;
    padding: 0;
    width: 100%;
    /* Hide horizontal scrollbar caused by clouds */
}

.cloud-container {
    position: fixed;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    pointer-events: none;
    /* This prevents the container from blocking interactions with underlying elements */
    z-index: 0;
}

.cloud {
    position: absolute;
    width: 100px;
    /* Adjust the size as needed */
    animation-duration: 50s;
    animation-iteration-count: infinite;
    overflow: hidden;
    transform: translate3d(0, 0, 0);
    /* Promote to a 3D layer for smoother animations */
}

/* Clouds moving from left to right */
.left-to-right-1 {
    animation-name: cloudAnimationLeftToRight1;
    top: 3%;
    left: -5%;
}

.left-to-right-2 {
    animation-name: cloudAnimationLeftToRight2;
    top: 28%;
    left: 17%;
}

.left-to-right-3 {
    animation-name: cloudAnimationLeftToRight3;
    top: 80%;
    left: -45%;
}

/* Clouds moving from right to left */
.right-to-left-1 {
    animation-name: cloudAnimationRightToLeft1;
    top: 17%;
    right: -5%;
}

.right-to-left-2 {
    animation-name: cloudAnimationRightToLeft2;
    top: 40%;
    right: -20%;
}

.right-to-left-3 {
    animation-name: cloudAnimationRightToLeft3;
    top: 65%;
    right: -35%;
}

@keyframes cloudAnimationLeftToRight1 {
    0% {
        transform: translateX(-100vh);
    }

    50% {
        transform: translateX(70vh);
    }

    100% {
        transform: translateX(-100vh);
    }
}

@keyframes cloudAnimationLeftToRight2 {
    0% {
        transform: translateX(-100vh);
    }

    50% {
        transform: translateX(100vh);
    }

    100% {
        transform: translateX(-100vh);
    }
}

@keyframes cloudAnimationLeftToRight3 {
    0% {
        transform: translateX(-100vh);
    }

    50% {
        transform: translateX(100vh);
    }

    100% {
        transform: translateX(-100vh);
    }
}

@keyframes cloudAnimationRightToLeft1 {
    0% {
        transform: translateX(100vh);
    }

    50% {
        transform: translateX(-100vh);
    }

    100% {
        transform: translateX(100vh);
    }
}

@keyframes cloudAnimationRightToLeft2 {
    0% {
        transform: translateX(100vh);
    }

    50% {
        transform: translateX(-100vh);
    }

    100% {
        transform: translateX(100vh);
    }
}

@keyframes cloudAnimationRightToLeft3 {
    0% {
        transform: translateX(100vh);
    }

    50% {
        transform: translateX(-100vh);
    }

    100% {
        transform: translateX(100vh);
    }
}
</style>

<div class="cloud-container">
    <!-- Clouds moving from left to right -->
    <div class="cloud left-to-right-1">
        <img src="/images/cloud.png" class="w-full scale-75" />
    </div>
    <div class="cloud left-to-right-2">
        <img src="/images/cloud.png" class="w-full scale-120" />
    </div>
    <div class="cloud left-to-right-3">
        <img src="/images/cloud.png" class="w-full scale-110" />
    </div>

    <!-- Clouds moving from right to left -->
    <div class="cloud right-to-left-1">
        <img src="/images/cloud.png" class="w-full scale-50" />
    </div>
    <div class="cloud right-to-left-2">
        <img src="/images/cloud.png" class="w-full " />
    </div>
    <div class="cloud right-to-left-3">
        <img src="/images/cloud.png" class="w-full" />
    </div>
</div>