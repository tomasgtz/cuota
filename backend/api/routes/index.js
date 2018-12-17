var UserModel = require('../models/users');
var AddressModel = require('../models/addresses');


//create a module for routing
module.exports = function(app) {
    //formulario que muestra los datos de un usuario para editar
    app.get("/user/update/:id", function(req, res) {
        var id = req.params.id;
        //solo actualizamos si la id es un número
        if (!isNaN(id)) {
            UserModel.getUser(id, function(error, data) {
                //si existe el usuario mostramos el formulario
                if (typeof data !== 'undefined' && data.length > 0) {
                    res.render("index", {
                        title: "Formulario",
                        info: data
                    });
                }
                //en otro caso mostramos un error
                else {
                    res.json(404, {
                        "msg": "notExist"
                    });
                }
            });
        }
        //si la id no es numerica mostramos un error de servidor
        else {
            res.status(500).json({
                "msg": "The id must be numeric"
            });
        }
    });

    

    //mostramos todos los usuarios 
    app.get("/users", function(req, res) {
        UserModel.getUsers(function(error, data) {
            if (error) {
                res.status(500).json(error);
            }
            //res.json(200,data);
            res.status(200).json(data);
        });
    });

    //obtiene un usuario por su id
    app.get("/users/id/:id", function(req, res) {
        //id del usuario
        var id = req.params.id;
        //solo actualizamos si la id es un número
        if (!isNaN(id)) {
            UserModel.getUser(id, function(error, data) {
                //si el usuario existe lo mostramos en formato json
                if (typeof data !== 'undefined' && data.length > 0) {
                    res.json(200, data);
                }
                //en otro caso mostramos una respuesta conforme no existe
                else {
                    res.json(404, {
                        "msg": "notExist"
                    });
                }
            });
        }
        //si hay algún error
        else {
            res.json(500, {
                "msg": "Error missing id "
            });
        }
    });


     //obtiene un usuario por su nombre
     app.get("/users/username/:name", function(req, res) {
        
        var name = req.params.name;
        
        if(name != null || name == '') {
            UserModel.getUserByName(name, function(error, data) {
                
                if (typeof data !== 'undefined' && data.length > 0) {
                    res.json(200, data);
                } else {
                    res.json(200, {
                        "msg": "user not found"
                    });
                }
            });
        
        } else {
            res.json(500, {
                "msg": "Error missing username"
            });
        }
    });


    //obtiene un usuario por su nombre
    app.post("/users/auth", function(req, res) {      

        const requestData = JSON.parse(req.body.json);
        
        var userData = {
            username: requestData.username,
            password: requestData.password
        };
        
        if(userData.username != null && userData.password != null) {
            UserModel.checkUserAndPassword(userData, function(error, data) {
                
                if (typeof data !== 'undefined' && data.length > 0) {
                    res.json(200, data);
                } else {
                    res.json(200, {
                        "msg": "user or password incorrect"
                    });
                }
            });
        
        } else {
            res.json(500, {
                "msg": "Error missing username"
            });
        }
    });

    //obtiene un usuario por su id
    app.post("/users", function(req, res) {
        //creamos un objeto con los datos a insertar del usuario
        var userData = {
            id: null,
            username: req.body.username,
            email: req.body.email,
            password: req.body.password,
            created_at: null,
            updated_at: null
        };
        UserModel.insertUser(userData, function(error, data) {
            //si el usuario se ha insertado correctamente mostramos su info
            if (data && data.insertId) {
                res.redirect("/users/" + data.insertId);
            } else {
                res.json(500, {
                    "msg": "Error"
                });
            }
        });
    });

    //función que usa el verbo http put para actualizar usuarios
    app.put("/users", function(req, res) {
        console.log(req.body);
        if(req.body.id === undefined || req.body.id === '' ) {
            res.json(200, {
                "msg": "no id provided"
            });
        } else {
            //almacenamos los datos del formulario en un objeto
            var userData = {
                id: req.param('id'),
                username: req.param('username'),
                email: req.param('email'),
                password: req.param('password'),
                firstName: req.param('firstName'),
                secondName: req.param('secondName'),
                lastName: req.param('lastName'),
                lastName2: req.param('lastName2'),
                phone: req.param('phone'),
                cellphone: req.param('cellphone'),
                role: req.param('role'),
                
            };
            UserModel.updateUser(userData, function(error, data) {
                //si el usuario se ha actualizado correctamente mostramos un mensaje
                if (data && data.msg) {
                    res.json(200, data);
                } else {
                    res.json(500, {
                        "msg": "Error"
                    });
                }
            });
        }
    });

    //utilizamos el verbo delete para eliminar un usuario
    app.delete("/users", function(req, res) {
        //id del usuario a eliminar
        var id = req.param('id');
        UserModel.deleteUser(id, function(error, data) {
            if (data && data.msg === "deleted" || data.msg === "notExist") {
                res.json(200, data);
            } else {
                res.json(500, {
                    "msg": "Error"
                });
            }
        });
    });


    app.get("/addresses/streets", function(req, res) {
        AddressModel.getStreets(function(error, data) {
            
            if (typeof data !==  'undefined' && data.length > 0) {
                res.json(200, data);
            } else {
                res.json(200, {

                    "msg": "streets not found"
                });
            }
        });
    });

    app.post("/addresses", function(req, res) {
        
        console.log(req.body.name);
        var streetData = {
            suburb_id: req.body.suburb_id,
            name: req.body.name,
            status_id: '1',
            created: new Date(),
            modified: new Date()
        };

        AddressModel.insertStreet(streetData, function(error, data) {
            
            if (data) {
                res.json(200, data);
            } else {
                res.json(500, error);
            }
        });
    });


}