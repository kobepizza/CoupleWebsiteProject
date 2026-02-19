import Phaser from 'phaser';

const container = document.getElementById('game-container');

if(container){

const config = {
    type: Phaser.AUTO,
    width: 100 ,
    height: 100,
    parent: 'game-container',
    scene: {
            create() {
        this.add.text(10, 10, 'Phaser is Ready!', {
            fontSize: '100px',
            color: '#ffffff'
        });
    }

    }
    };
    
    new Phaser.Game(config);

}

