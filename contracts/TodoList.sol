pragma solidity ^0.5.0;

contract TodoList {
  uint public Count = 0;

  struct Task{
    uint id;
    uint uid;
    string cgpa1;
    string cgpa2;
    string cgpa3;
    string cgpa4;
    string Report;
    string Certificate;
  }

  mapping (uint => Task) public tasks;

  event TaskCreated(
    uint id,
    uint uid,
    string cgpa1,
    string cgpa2,
    string cgpa3,
    string cgpa4,
    string Report,
    string Certificate
  );

  event TaskCompleted(
    uint id
  );

  constructor() public{
    createTask(2016140030, "9", "10", "8", "7", "Yes", " No");
  }

  function createTask(uint _uid, string memory _cgpa1, string memory _cgpa2, string memory _cgpa3, string memory _cgpa4, string memory _report, string memory _certi) public {
    Count ++;
    tasks[Count] = Task(Count, _uid, _cgpa1, _cgpa2, _cgpa3, _cgpa4, _report, _certi);
    emit TaskCreated(Count, _uid, _cgpa1, _cgpa2, _cgpa3, _cgpa4, _report, _certi);
  }

  function toggleCompleted(uint _id) public{
    Task memory _task = tasks[_id];
    tasks[_id] = _task;
    emit TaskCompleted(_id);
  }
}
