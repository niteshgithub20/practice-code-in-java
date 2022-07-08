import java.util.ArrayList;
import java.util.List;
class ParseStudents
{    public static void main(String s[])
    {
        String data = "Siva,2,78,A\n";
        data += "Mobeen,3,92,B\n";
        data += "Prem,2,87,B\n";
        data += "Sasitha,2,86,A\n";
        data += "Srini,8,65,A\n";
        data += "Zakir,12,73,A\n";
        
        List result = parseStudents(data);
        
        for(int i = 0; i < result.size(); i++)
        {
            Student student = result.get(result);
            System.out.println(student.name + " in section " + student.section + " and roll number " + student.rollNumber + " got " + student.marks + " marks.");
        }

    }


public static List<Student> parseStudents(String data)
{
//Write code here to the parse the comma separated data and create the Student objects
}
}
class Student
{
String name;
int rollNumber;
int marks;
char section;

Student(String name, int rollNumber, int marks, char section)
{
this.name = name;
this.rollNumber = rollNumber;
this.marks = marks;
this.section = section;
}
}