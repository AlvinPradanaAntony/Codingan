import { async } from "@firebase/util";
import { addDoc, collection, doc, getDoc, onSnapshot, orderBy, query, setDoc, Timestamp, updateDoc } from "firebase/firestore";
import { getDownloadURL, ref, uploadBytes } from "firebase/storage";
import react, { useEffect, useState } from "react";
import { useParams } from "react-router-dom";
import Message from "../components/Message";
import MessageForm from "../components/MessageForm";
import { auth, db, storage } from "../firebase";

const Chat = () => {
  const [selectedUser, setSelectedUser] = useState([]);
  const [text, setText] = useState("");
  const [img, setImg] = useState("");
  const [msgs, setMsgs] = useState([]);
  const { id } = useParams();

  const user1 = auth.currentUser.uid;
  const user2 = id;
  const idMsg = user1 > user2 ? `${user1 + user2}` : `${user2 + user1}`;
  const msgsRef = collection(db, "messages", idMsg, "chat");
  const q = query(msgsRef, orderBy("createdAt", "asc"));

  useEffect(async () => {
    getDoc(doc(db, "users", id)).then((doc) => {
      setSelectedUser(doc.data());
    });
    onSnapshot(q, (querySnapshot) => {
      setMsgs(querySnapshot.docs.map((doc) => doc.data()));
    });
  }, []);
  console.log(selectedUser);

  console.log("Set msg: ", msgs);

  // const viewMessages = async () => {
  //   const msgsRef = collection(db, "messages", idMsg, "chat");
  //   const q = query(msgsRef, orderBy("createdAt", "asc"));

  //   onSnapshot(q, (querySnapshot) => {
  //     let msgs = [];
  //     querySnapshot.forEach((doc) => {
  //       msgs.push(doc.data());
  //     });
  //     setMsgs(msgs);
  //   });

  //   const docSnap = await getDoc(doc(db, "lastMsg", id));
  //   if (docSnap.data() && docSnap.data().from !== user1) {
  //     // update last message doc, set unread to false
  //     await updateDoc(doc(db, "lastMsg", id), { unread: false });
  //   }
  // }
  // viewMessages();
  // viewMessages();
  // console.log(chat);

  const handleSubmit = async (e) => {
    e.preventDefault();

    const user2 = id;
    const idMsg = user1 > user2 ? `${user1 + user2}` : `${user2 + user1}`;

    let url;
    if (img) {
      const imgRef = ref(storage, `images/${new Date().getTime()} - ${img.name}`);
      const snap = await uploadBytes(imgRef, img);
      const dlUrl = await getDownloadURL(ref(storage, snap.ref.fullPath));
      url = dlUrl;
    }

    await addDoc(collection(db, "messages", idMsg, "chat"), {
      text,
      from: user1,
      to: user2,
      createdAt: Timestamp.fromDate(new Date()),
      media: url || "",
    });

    await setDoc(doc(db, "lastMsg", idMsg), {
      text,
      from: user1,
      to: user2,
      createdAt: Timestamp.fromDate(new Date()),
      media: url || "",
      unread: true,
    });

    setText("");
    setImg("");
  };
  return (
    <div className="messages_container">
      {selectedUser ? (
        <>
          <div className="messages_user">
            <h3>{selectedUser.name}</h3>
          </div>
          <div className="messages">{msgs.length ? msgs.map((msg, i) => <Message key={i} msg={msg} user1={user1} />) : null}</div>
          <MessageForm handleSubmit={handleSubmit} text={text} setText={setText} setImg={setImg} />
        </>
      ) : (
        <h3 className="no_conv">Select a user to start conversation</h3>
      )}
    </div>
  );
};

export default Chat;
