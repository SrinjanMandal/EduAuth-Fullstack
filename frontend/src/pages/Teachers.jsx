import React,{useState,useEffect} from 'react'
import axios from 'axios'
export default function Teachers(){
  const [list,setList]=useState([])
  const [form,setForm]=useState({user_id:'',university_name:'',gender:'',year_joined:''})
  const load=async()=>{
    let token=localStorage.getItem('token')
    let res=await axios.get('http://localhost:8080/api/teachers',{headers:{Authorization:`Bearer ${token}`}})
    setList(res.data)
  }
  const submit=async()=>{
    let token=localStorage.getItem('token')
    await axios.post('http://localhost:8080/api/teachers',form,{headers:{Authorization:`Bearer ${token}`}})
    load()
  }
  useEffect(()=>{load()},[])
  return <div>
    <h2>Teachers</h2>
    <input placeholder="User ID" onChange={e=>setForm({...form,user_id:e.target.value})}/>
    <input placeholder="University" onChange={e=>setForm({...form,university_name:e.target.value})}/>
    <input placeholder="Gender" onChange={e=>setForm({...form,gender:e.target.value})}/>
    <input placeholder="Year joined" onChange={e=>setForm({...form,year_joined:e.target.value})}/>
    <button onClick={submit}>Add Teacher</button>
    <ul>{list.map(t=><li key={t.id}>{t.university_name} - {t.gender}</li>)}</ul>
  </div>
}