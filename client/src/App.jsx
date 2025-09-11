import { useEffect, useState } from 'react'
import './App.css'

function App() {
  const [apiStatus, setApiStatus] = useState('checking...')

  useEffect(() => {
    fetch('/api/health')
      .then((r) => (r.ok ? r.json() : Promise.reject()))
      .then(() => setApiStatus('ok'))
      .catch(() => setApiStatus('unreachable'))
  }, [])

  return (
    <div style={{ padding: 24 }}>
      <h2>MSDental MERN</h2>
      <p>API health: {apiStatus}</p>
    </div>
  )
}

export default App
