<template>
    <div class="wrapper">
        <div class="container">
            <h4>Register User</h4>
            <form action="">
                <table>
                    <tr>
                        <td><label for="lname">Last Name:</label></td>
                        <td><input type="text" v-model="lname" id="lname"></td>
                        <td><label for="mname">Middle Name:</label></td>
                        <td><input type="text" v-model="mname" id="mname"></td>
                    </tr>
                    <tr>
                        <td><label for="role">Select Role: </label></td>
                        <td><select name="role" id="role" v-model="role">
                                <option value="seller">SELLER</option>
                                <option value="buyer">BUYER</option>
                            </select>
                        </td>
                        <td><label for="email">Email Address: </label></td>
                        <td><input type="email" v-model="email" id="email" autocomplete="off"></td>
                    </tr>
                    <tr>
                        <td><label for="password">Password</label></td>
                        <td><input type="password" v-model="password" id="password"></td>
                        <td><label for="repeatPassword">Repeat Password:</label></td>
                        <td><input type="password" v-model="repeatPassword" id="repeatPassword"></td>
                    </tr>
                </table>
                <button type="submit"> Register</button>  
                <a href="/" class="login"> Login</a> 
            </form>
             


        </div>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                fname: '',
                lname: '',
                mname: '',
                role : '',
                sex : '',
                email : '',
                password: '',
                repeatPassword: ''
            }
        }
    }
</script>
<style scoped>
    .wrapper{
        display: flex;
        height: 80vh;
        width: 200vh;
        justify-content: center;
        align-items: center;
    }
    .container{
        background-color: aliceblue;
        width: 95vh;
        padding: 20px 40px 40px 40px;
        border: 1px solid black;
    }
    label{
        margin: 5px;
        
    }
    input, select{
        border: 1px solid black;
        margin: 10px 5px 10px 5px;
        width: 180px;
        font-family: 'Courier New', Courier, monospace;
    }
    button, a{
        background-color: brown;
        color: white;
        padding: 5px 20px 5px 20px;
        margin: 10px 10px 0px 0px;
    }
    .login{
        background-color: blue;
        text-decoration: none;
        color: white;
    }
</style>

