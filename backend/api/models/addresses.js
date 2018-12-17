var mysql = require('mysql2'),

    connection = mysql.createConnection({
        host: 'localhost',
        user: 'root',
        password: 'password',
        database: 'sistema_cuotas'
    });

var addressModel = {};

addressModel.getStreets = function(callback) {
    if (connection) {
        connection.query('SELECT id, name FROM streets WHERE suburb_id = 2 ORDER BY name', function(error, rows) {

            if (error) {
                callback("Error en query ", null);
            } else {
                callback(null, rows);
            }
        });
    }
}

addressModel.getStreet = function(id, callback) {
    if (connection) {
        var sql = 'SELECT id, name FROM streets WHERE id = ' + connection.escape(id);
        connection.query(sql, function(error, row) {
            if (error) {
                callback(null, {
                    "msg": "error: al obtener calles " + error
                });
            } else {
                callback(null, row);
            }
        });
    }
}

addressModel.insertStreet = function(streetData, callback) {

    console.log(streetData);
    if (connection) {
        connection.query('INSERT INTO streets SET ?', streetData, function(error, result) {
            if (error) {
               
                callback({
                    "msg": "error: al insertar calle " + error
                }, null);
            } else {
               
                callback(null, {
                    "msg": "success"
                } );
            }
        });
    }
}

addressModel.updateStreet = function(streetData, callback) {
    //console.log(userData); return;
    if (connection) {

        var sql = 'UPDATE streets SET name = ' + connection.escape(streetData.name) + ',' +
            'status = ' + connection.escape(streetData.status) + ',' +
            'name = ' + connection.escape(streetData.firstName) + ',' +
            'modified = NOW()';

            sql += 'WHERE id = ' + streetData.id;

            connection.query(sql, function(error, result) {
            if (error) {
                callback(null, {
                    "msg": "error: calle no actualizada" + error
                });
            } else {
                callback(null, {
                    "msg": "success"
                });
            }
        });
        
    }
}

addressModel.deleteStreet = function(id, callback) {
    if (connection) {
        var sqlExists = 'SELECT * FROM streets WHERE id = ' + connection.escape(id);
        connection.query(sqlExists, function(err, row) {
            //check if exists
            if (row) {
                var sql = 'DELETE FROM streets WHERE id = ' + connection.escape(id);
                connection.query(sql, function(error, result) {
                    if (error) {
                        throw error;
                    } else {
                        callback(null, {
                            "msg": "deleted"
                        });
                    }
                });
            } else {
                callback(null, {
                    "msg": "notExist"
                });
            }
        });
    }
}

module.exports = addressModel;