import classes from './classes.module.css'
import {useRef, useState} from "react";
import {Input} from "reactstrap";

export default ({tagsProps, name}) => {

    const [tags, setTags] = useState(tagsProps ? [...tagsProps] : [])
    let tagInput = useRef();

    let removeTag = (i) => {
        const newTags = [...tags];
        newTags.splice(i, 1);
        setTags(newTags);
    }

    let inputKeyDown = (e) => {
        const val = e.target.value;
        if (e.key === 'Control' && val) {
            if (tags.find(tag => tag.toLowerCase() === val.toLowerCase())) {
                return;
            }
            setTags([...tags, val]);
            tagInput.current.value = null;
        } else if (e.key === 'Backspace' && !val) {
            removeTag(tags.length - 1);
        }
    }
    return (
        <div className={classes.inputTag}>
            <ul className={classes.inputTag__tags}>
                {tags.map((tag, i) => (
                    <li>
                        <Input size={tag.length} bsSize="sm" className="bg-transparent " type="text" readOnly={true} name={name + '[' + i + ']'} key={tag} value={tag}/>
                        <button type="button" onClick={() => {
                            removeTag(i);
                        }}><i className=" ni ni-fat-remove"></i>
                        </button>
                    </li>

                ))}
                <li className={classes.inputTag__tags__input}><input type="textarea" onKeyDown={inputKeyDown} ref={tagInput}/></li>
            </ul>
        </div>
    )
}
