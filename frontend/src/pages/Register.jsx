import React,{useState} from 'react'
import axios from 'axios'
export default function Register(){
  const [form,setForm] = useState({email:'',first_name:'',last_name:'',password:''})
  const submit=async()=>{
    await axios.post('http://localhost:8080/api/auth/register',form)
    alert('Registered')
  }
  return <div>
    <h2>Register</h2>
    <input placeholder="Email" onChange={e=>setForm({...form,email:e.target.value})}/>
    <input placeholder="First name" onChange={e=>setForm({...form,first_name:e.target.value})}/>
    <input placeholder="Last name" onChange={e=>setForm({...form,last_name:e.target.value})}/>
    <input type="password" placeholder="Password" onChange={e=>setForm({...form,password:e.target.value})}/>
    <button onClick={submit}>Submit</button>
  </div>
}