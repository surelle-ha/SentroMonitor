import socket

last_Update_date = "Fri May 06"
last_Update_time = "3:13 PM"
d_ver = "1.0.2"
release_mode = "DEVELOPER"

s = socket.socket()
host = "0.0.0.0"
port = 1220
s.bind((host, port))

if __name__ == "__main__":
	print(f"\033[95mSENTRO MONITOR FRAMEWORK {d_ver} ( main, {last_Update_date}, {last_Update_time} ) [ \033[5m{release_mode}\033[0m \033[95m]\033[0m")
	print('\033[91mType "help", "copyright", "credits" or "license" for more information. Start listening "run".\033[0m')
	s.listen(5)
	while True:
	   c, addr = s.accept()
	   data = c.recv(1024)
	   if data: print(data.decode("utf-8"))
	   c.close()
