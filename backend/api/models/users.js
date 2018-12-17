var mysql = require('mysql2'),

    connection = mysql.createConnection({
        host: 'localhost',
        user: 'root',
        password: 'password',
        database: 'sistema_cuotas'
    });

var userModel = {};

// get all users
userModel.getUsers = function(callback) {
    if (connection) {
        connection.query('SELECT * FROM users ORDER BY id', function(error, rows) {

            if (error) {
                callback("Error en query ", null);
            } else {
                callback(null, rows);
            }
        });
    }
}



//get one user by id
userModel.getUser = function(id, callback) {
    if (connection) {
        var sql = 'SELECT * FROM users WHERE id = ' + connection.escape(id);
        connection.query(sql, function(error, row) {
            if (error) {
                throw error;
            } else {
                callback(null, row);
            }
        });
    }
}


userModel.getUserByName = function(name, callback) {
    if (connection) {
        var sql = 'SELECT users_suburbs.suburb_id, id, username, name as firstName, middle_name as secondName, last_name as lastName, second_last_name as lastName2, ' + 
        'status_id, registration_status_id, cell_phone as cellphone, phone, role FROM users, users_suburbs WHERE users.id = users_suburbs.user_id AND username = ' + connection.escape(name);
        connection.query(sql, function(error, row) {
            if (error) {
                callback(error, null);
            } else {
                callback(null, row);
            }
        });
    }
}

userModel.checkUserAndPassword = function(userData, callback) {
    if (connection) {
        var sql = 'SELECT * FROM users WHERE username = ' + connection.escape(userData.username) + ' and password = ' + connection.escape(userData.password);
        connection.query(sql, function(error, row) {
            if (error) {
                throw error;
            } else {
                callback(null, row);
            }
        });
    }
}



//add new user
userModel.insertUser = function(userData, callback) {
    if (connection) {
        connection.query('INSERT INTO users SET ?', userData, function(error, result) {
            if (error) {
                throw error;
            } else {
                //last inserted id
                callback(null, {
                    "insertId": result.insertId
                });
            }
        });
    }
}

//update user
userModel.updateUser = function(userData, callback) {
    //console.log(userData); return;
    if (connection) {

        var sql = 'UPDATE users SET username = ' + connection.escape(userData.username) + ',' +
            'username = ' + connection.escape(userData.username) + ',' +
            'name = ' + connection.escape(userData.firstName) + ',' +
            'middle_name = ' + connection.escape(userData.secondName) + ',' +
            'last_name = ' + connection.escape(userData.lastName) + ',' +
            'second_last_name = ' + connection.escape(userData.lastName2) + ',' +
            'cell_phone = ' + connection.escape(userData.cellphone)+ ',' +
            'phone = ' + connection.escape(userData.phone)+ ',' +
            'role = ' + connection.escape(userData.role)+ ',' +
            'modified = NOW()';

            if(userData.password !== 'nochange') {
                sql += ', password = ' + connection.escape(userData.password);
            }
            console.log(userData);
            sql += 'WHERE id = ' + userData.id;

            connection.query(sql, function(error, result) {
            if (error) {
                callback(null, {
                    "msg": "error: usuario no actualizado" + error
                });
            } else {
                callback(null, {
                    "msg": "success"
                });
            }
        });
        
    }
}

//delete user by id
userModel.deleteUser = function(id, callback) {
    if (connection) {
        var sqlExists = 'SELECT * FROM users WHERE id = ' + connection.escape(id);
        connection.query(sqlExists, function(err, row) {
            //check if exists
            if (row) {
                var sql = 'DELETE FROM users WHERE id = ' + connection.escape(id);
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

module.exports = userModel;