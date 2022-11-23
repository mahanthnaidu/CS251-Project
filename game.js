class Game {

    constructor(config = {}) {
        
        this.client = stitch.Stitch.initializeDefaultAppClient(config.realmAppId);
        this.database = this.client.getServiceClient(stitch.RemoteMongoClient.factory, "mongodb-atlas").db(config.databaseName);
        this.collection = this.database.collection(config.collectionName);
    }
    async authenticate() { 
        return this.client.auth.loginWithCredential(new stitch.AnonymousCredential());
    }
    async joinOrCreateGame(id) {
        try {
            let auth = await game.authenticate();
            let result = await game.joinGame(id, auth.id);
            if (result == null) {
                result = await game.createGame(id, auth.id);
            }
            return result;
        } catch (e) {
            console.error(e);
        }
     }
    async joinGame(id, authId) {
        try {
            let result = await this.collection.findOne({ "_id": id });
            if(result != null) {
                this.game = new Phaser.Game(this.phaserConfig);
                this.game.scene.start("default", {
                    "gameId": id,
                    "collection": this.collection,
                    "authId": authId,
                    "ownerId": result.owner_id,
                    "strokes": result.strokes
                });
            }
            return result;
        } catch (e) {
            console.error(e);
        }
     }
    async createGame(id, authId) {
        this.game = new Phaser.Game(this.phaserConfig);
        this.game.scene.start("default", {});
     }

}


