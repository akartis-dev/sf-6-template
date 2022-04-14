import { h } from "preact";
import { useState } from "preact/hooks";
import {renderPreact} from "../render";

const Counter = () => {
  const [counter, setCounter] = useState(0);

  return (
    <div>
      <button
        type="button"
        className="btn btn-warning"
        onClick={() => setCounter(counter - 1)}
      >
        Decrementer
      </button>
      <button
        type="button"
        className="btn btn-success"
        onClick={() => setCounter(counter + 1)}
      >
        Incrémenter
      </button>
      <div>{counter}</div>
    </div>
  );
};

renderPreact(Counter, 'app-counter')
