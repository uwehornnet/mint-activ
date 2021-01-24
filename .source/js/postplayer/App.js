import React, { useEffect, useState, useRef } from 'react'
import Spinner from './Spinner'

const App = ({ post }) => {
    const [loading, setLoading] = useState(true)
    const [videos, setVideos] = useState([])
    const [activeVideo, setActiveVideo] = useState(null)
    const [session, setSession] = useState([])

    const player = useRef()

    const fetchVideos = async () => {
        const response = await fetch(`${location.origin}/wp-json/app/v1/get_media?id=${post}`)
            .then((res) => res.json())
            .catch((err) => console.log(err))

        setVideos(response)
        const windowSession = window.sessionStorage.getItem('played')
        if (windowSession) {
            setSession(JSON.parse(windowSession))
        } else {
            setSession([response[0].id])
        }
        setLoading(false)
    }

    const handlePlayerEnded = async (e) => {
        const currentIndex = videos.findIndex((x) => x.id === activeVideo.id)
        const nextVideo = videos[currentIndex + 1]
        if (nextVideo) {
            setSession([...session, nextVideo.id])
            window.sessionStorage.setItem('played', JSON.stringify([...session, nextVideo.id]))
        }
    }

    const handleVideoClick = (video) => {
        setActiveVideo(video)
        player.current.play()
    }

    useEffect(() => {
        fetchVideos()
    }, [])

    useEffect(() => {
        if (session) {
            const id = session[session.length - 1]
            setActiveVideo(videos.find((video) => video.id === id))
        }
    }, [session])

    return loading ? (
        <Spinner />
    ) : (
        <div className="postplayer">
            <div className="postplayer__column">
                <video ref={player} controls onEnded={handlePlayerEnded}>
                    <source src={activeVideo.link} type="video/mov" />
                    <source src={activeVideo.link} type="video/ogg" />
                    Your browser does not support the video tag.
                </video>
            </div>
            <div className="postplayer__column">
                <ul>
                    {videos.map((video) => (
                        <li
                            key={video.name}
                            className={session.includes(video.id) ? 'active' : null}
                            onClick={session.includes(video.id) ? () => handleVideoClick(video) : null}
                        >
                            {session.includes(video.id) ? (
                                <svg viewBox="0 0 30.051 30.051">
                                    <path d="m19.982 14.438-6.24-4.536c-.229-.166-.533-.191-.784-.062-.253.128-.411.388-.411.669v9.069c0 .284.158.543.411.671.107.054.224.081.342.081.154 0 .31-.049.442-.146l6.24-4.532c.197-.145.312-.369.312-.607.001-.242-.117-.465-.312-.607z" />
                                    <path d="m15.026.002c-8.3 0-15.026 6.726-15.026 15.026 0 8.297 6.726 15.021 15.026 15.021 8.298 0 15.025-6.725 15.025-15.021.001-8.3-6.727-15.026-15.025-15.026zm0 27.54c-6.912 0-12.516-5.601-12.516-12.514 0-6.91 5.604-12.518 12.516-12.518 6.911 0 12.514 5.607 12.514 12.518.001 6.913-5.603 12.514-12.514 12.514z" />
                                </svg>
                            ) : (
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="m18.75 24h-13.5c-1.24 0-2.25-1.009-2.25-2.25v-10.5c0-1.241 1.01-2.25 2.25-2.25h13.5c1.24 0 2.25 1.009 2.25 2.25v10.5c0 1.241-1.01 2.25-2.25 2.25zm-13.5-13.5c-.413 0-.75.336-.75.75v10.5c0 .414.337.75.75.75h13.5c.413 0 .75-.336.75-.75v-10.5c0-.414-.337-.75-.75-.75z" />
                                    <path d="m17.25 10.5c-.414 0-.75-.336-.75-.75v-3.75c0-2.481-2.019-4.5-4.5-4.5s-4.5 2.019-4.5 4.5v3.75c0 .414-.336.75-.75.75s-.75-.336-.75-.75v-3.75c0-3.309 2.691-6 6-6s6 2.691 6 6v3.75c0 .414-.336.75-.75.75z" />
                                    <path d="m12 17c-1.103 0-2-.897-2-2s.897-2 2-2 2 .897 2 2-.897 2-2 2zm0-2.5c-.275 0-.5.224-.5.5s.225.5.5.5.5-.224.5-.5-.225-.5-.5-.5z" />
                                    <path d="m12 20c-.414 0-.75-.336-.75-.75v-2.75c0-.414.336-.75.75-.75s.75.336.75.75v2.75c0 .414-.336.75-.75.75z" />
                                </svg>
                            )}
                            <span>{video.name}</span>
                        </li>
                    ))}
                </ul>
            </div>
        </div>
    )
}

export default App
