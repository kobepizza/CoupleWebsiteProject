import Phaser from 'phaser';

class MainScene extends Phaser.Scene {

    constructor() {
        super('MainScene');
    }

    preload() {
        this.load.image('player', '/images/player.png');
    }

    create() {

        // Create player with physics
        this.player = this.physics.add.sprite(400, 300, 'player');

        // Prevent leaving screen
        this.player.setCollideWorldBounds(true);

        // Keyboard input
        this.cursors = this.input.keyboard.addKeys({
            up: Phaser.Input.Keyboard.KeyCodes.W,
            down: Phaser.Input.Keyboard.KeyCodes.S,
            left: Phaser.Input.Keyboard.KeyCodes.A,
            right: Phaser.Input.Keyboard.KeyCodes.D
        });
        
    }

    update() {

        const speed = 200;

        // Reset velocity every frame
        this.player.setVelocity(0);

        if (this.cursors.left.isDown) {
            this.player.setVelocityX(-speed);
        }
        else if (this.cursors.right.isDown) {
            this.player.setVelocityX(speed);
        }

        if (this.cursors.up.isDown) {
            this.player.setVelocityY(-speed);
        }
        else if (this.cursors.down.isDown) {
            this.player.setVelocityY(speed);
        }
    }
}


const container = document.getElementById('game-container');

if (container) {
   const config = {
    type: Phaser.AUTO,
    width: 800,
    height: 600,
    parent: 'game-container',
    backgroundColor: '#1a1a1a',
    pixelArt: true,
    physics: {
        default: 'arcade',
        arcade: {
            gravity: { y: 0 },
            debug: true
        }
    },
    scene: [MainScene]
};
    new Phaser.Game(config);
}
